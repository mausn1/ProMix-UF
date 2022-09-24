<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once 'db.php';
require_once 'emailController.php';


$errors = array();
$message = array();
$username = "";
$email = "";
$bio = "";
$passreset_at = "";


// om användare trycker på registrering knapp
if (isset($_POST['signup-btn'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConf = trim($_POST['passwordConf']);
    $captcha = trim($_POST['g-recaptcha-response']);


    // validation
    if (empty($username)) {
        $errors['username'] = "Användarnamn nödvändigt.";
    }
    //Tittar om den är email är skriven rätt 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailnot'] = "Email adress är ogiltig.";
    }
    if (empty($email)) {
        $errors['email'] = "Email nödvändigt.";
    }
    if (empty($password)) {
        $errors['password'] = "Lösenord nödvändigt.";
    }
    //lösonord inte rätt med confpass
    if ($password !== $passwordConf) {
        $errors['passwordsame'] = "Lösenorden är inte likadana.";
    }
    //recaptcha
    if (!$captcha) {
        $errors['captcha'] = "ReCAPTCHA är antingen ofylld eller fel.";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $usernameQuery = "SELECT * FROM users WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCountt = $result->num_rows;
    $stmt->close();


    if ($userCount > 0) {
        $errors['emailexist'] = "Email finns redan.";
    }

    if ($userCountt > 0) {
        $errors['usernameexist'] = "Användarnamn finns redan.";
    }
    

    if (strlen($username) > 18) {
        $errors['usernamenot'] = "Användarnamn tillåter endast 18 karaktärer.";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;
        $bio = "";
        $passreset_at = "";

        $sql = "INSERT INTO users (username, email, verified, token, password, bio, passreset_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssdsssi', $username, $email, $verified, $token, $password, $bio, $passreset_at);

        if ($stmt->execute()) {
            //flash message

            sendVerificationEmail($email, $token);

            $message['message1'] = "Registrering lyckad. Gå till din email och verifiera ditt konto.";
        } else {
            $errors['db_error'] = "Databas fel: misslyckad registrering.";
        }
    }
}

// om användare trycker på login knapp
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Användarnamn eller email nödvändig.';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Lösenord nödvändigt.';
    }
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();
                if($user['verified'] == "1"){
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['bio'] = $user['bio'];
                    header('location: https://promix-uf.se/account/mypage/dashboard');
                    exit(0);
                } else {
                    $errors['notverified'] = "Du måste verifiera ditt konto.";
                    printf($errors['notverified']);
                }
            } else { // if password does not match
                $errors['login_fail'] = "Fel användarnamn/email eller lösenord.";
            }
        } else {
            $errors['db_error'] = "Databas fel: Kontakta admin.";
        }
    }

}


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verify']);
    header("location: / ");
    exit(0);
}


//användare klickar på återställ lösenord button
if (isset($_POST['forgotpassword'])) {
    $email = trim($_POST['email']);


    //Tittar om den är email är skriven rätt 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailnot'] = "Email adress är ogiltig.";
    }
    if (empty($email)) {
            $errors['email'] = "Email nödvändigt.";
    }

    if (count($errors) == 0) {
        $sql ="SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET passreset_at=now() WHERE email='$email'";
        mysqli_query($conn, $query);
        $token = $user['token'];
        sendPasswordResetLink($email, $token);
        $_SESSION['message'] = "Email har skickats. Titta i din varukorg.";
    }
}

if (isset($_POST['reset-password-btn'])) {
    $password = trim($_POST['password']);
    $passwordConf = trim($_POST['passwordConf']);

    if (empty($password)) {
        $errors['password'] = "Lösenord nödvändigt.";
    }
    //lösonord inte rätt med confpass
    if ($password !== $passwordConf) {
        $errors['passwordsame'] = "Lösenorden är inte likadana.";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];
    $token = bin2hex(random_bytes(50));


    if (count($errors) == 0) {
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "UPDATE users SET token='$token' WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                unset($_SESSION['email']);
                header('location: login');
                exit(0);
            }
        }
    }
}

function resetPassword($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: resetpassword');
    exit(0);
}
 
if (isset($_POST['settings-btn'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $bio = trim($_POST['bio']);
    
    $userses = $_SESSION['username'];
    $sql = "SELECT id FROM users WHERE username='$userses'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $cool = $user['id'];
    
    if (empty($username)) {
        $errors['username'] = "Användarnamn nödvändigt.";
    }
    //Tittar om den är email är skriven rätt 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailnot'] = "Email adress är ogiltig.";
    }
    if (empty($email)) {
        $errors['email'] = "Email nödvändigt.";
    }
    
    if (strlen($username) > 18) {
        $errors['usernamenot'] = "Användarnamn tillåter endast 18 karaktärer.";
    }
    
    if (strlen($bio) > 150) {
        $errors['bionot'] = "Biografi tillåter endast 150 karaktärer.";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? AND NOT id='$cool' LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $usernameQuery = "SELECT * FROM users WHERE username=? AND NOT id='$cool' LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCountt = $result->num_rows;
    $stmt->close();


    if ($userCount > 0) {
        $errors['emailexist'] = "Email finns redan.";
    }

    if ($userCountt > 0) {
        $errors['usernameexist'] = "Användarnamn finns redan.";
    }

    if (count($errors) === 0) {
    $query = "UPDATE users SET username=?, email=?, bio=? WHERE id='$cool'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $username, $email, $bio);
    
    
        if ($stmt->execute()) {
        $stmt->close();
            if ($_SESSION['username'] == $username){
            }else {
                $_SESSION['username'] = $username;
                $message['changed1'] = "Lyckad ändring av användarnamn.";
            }
            if ($_SESSION['email'] == $email){
            }else {
                $_SESSION['email'] = $email;
                $message['changed2'] = "Lyckad ändring av email.";
            }
            if ($_SESSION['bio'] == $bio){
            }else {
                $_SESSION['bio'] = $bio;
                $message['changed3'] = "Lyckad ändring av biografi.";

            }
        }else 
            $errors['database_error'] = "Error: databas fel. Kontakta admin";
    }
}

if (isset($_POST['settings-changepass-btn'])) {
    $password = trim($_POST['password']);
    $passwordConf = trim($_POST['passwordConf']);
    
    if (empty($password)) {
        $errors['password'] = "Lösenord nödvändigt.";
    }
    
    if ($password !== $passwordConf) {
        $errors['passwordsame'] = "Lösenorden är inte likadana.";
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    $username = $_SESSION['username'];

    
    if (count($errors) === 0) {
        $query = "UPDATE users SET password='$password' WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if ($result){
            $_SESSION['password'] = $password;
            $message['passchanged'] = "Ditt ändring av lösenord är lyckad!";
        }else {
            $errors['database_error'] = "Databas fel: ditt lösenord ändrades inte.";
        }
    }
    

}

$userses = $_SESSION['username'];
$sql = "SELECT id FROM users WHERE username='$userses'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$cool = $user['id'];
$cart_query = "SELECT * FROM orders WHERE customer_id='$cool' AND purchased=0";
$cart_query2 = "SELECT * FROM orders WHERE customer_id='$cool' AND purchased=1";
$resultu = $conn->query($cart_query);
$resultd = $conn->query($cart_query);
$orders = $conn->query($cart_query2);




if (isset($_POST['save_cart'])){
    while ($cart_row = $resultu->fetch_assoc()){
        $i = 0;
        foreach($resultu as $column) {
            $product = $_POST['product'.$i];
            $productid = $column['product_id'];
            if(0 >= $product ){
                $newqq = "DELETE FROM orders WHERE customer_id='$cool' AND product_id='$productid' AND purchased=0";
                $resultt = $conn->query($newqq);
            }else{
            $newq = "UPDATE orders SET amount='$product' WHERE customer_id='$cool' AND product_id='$productid' AND purchased=0";
            $result2 = $conn->query($newq);
            }
            $i++;

        }
    }
    header("Refresh:0");
}

while ($cart_roww = $resultd->fetch_assoc()){
$d=0;
foreach($resultd as $columnn){
    $productidd = $columnn['product_id'];
    $remove = $_POST['remove_item'.$d];
    $totalcart += $columnn['price']*$columnn['amount'];
    if (isset($remove)){
        $newqqq = "DELETE FROM orders WHERE customer_id='$cool' AND product_id='$productidd' AND purchased=0";
        $resulttt = $conn->query($newqqq);
        header("Refresh:0");

    }
    $d++;
    }

}

if (isset($_POST['to_checkout'])){
    header('location: https://promix-uf.se/shop/checkout');
}


$poopoo = "SELECT product_id FROM orders WHERE customer_id='$cool' AND product_id='2' AND purchased=0";
$poopoopoo = "SELECT product_id FROM orders WHERE customer_id='$cool' AND product_id='3' AND purchased=0";
$poo = "SELECT product_id FROM orders WHERE customer_id='$cool' AND product_id='1' AND purchased=0";
$resultpu = $conn->query($poo);
$resultpupu = $conn->query($poopoo);
$resultpupupu = $conn->query($poopoopoo);


if (isset($_POST['shop_one'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    if ($resultpupupu->num_rows > 0){ 
        $onepu1 = "UPDATE orders SET amount=amount+1 WHERE customer_id='$cool' AND product_id='3' AND purchased=0";
        $nicepu1 = $conn->query($onepu1);
    }else{
        $oneq1 = "INSERT INTO orders (customer_id,product_id,amount,price,purchased) VALUES ('$cool',3,1,50,0)";
        $niceu1 = $conn->query($oneq1);
    }
}

if (isset($_POST['shop_two'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    if ($resultpu->num_rows > 0){ 
        $onepu2 = "UPDATE orders SET amount=amount+1 WHERE customer_id='$cool' AND product_id='1' AND purchased=0";
        $nicepu2 = $conn->query($onepu2);
    }else{
        $oneq2 = "INSERT INTO orders (customer_id,product_id,amount,price, purchased) VALUES ('$cool',1,1,50,0)";
        $niceu2 = $conn->query($oneq2);
    }
}

if (isset($_POST['shop_three'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    if ($resultpupu->num_rows > 0){ 
        $onepu3 = "UPDATE orders SET amount=amount+1 WHERE customer_id='$cool' AND product_id='2' AND purchased=0";
        $nicepu3 = $conn->query($onepu3);
    }else{
        $oneq3 = "INSERT INTO orders (customer_id,product_id,amount,price, purchased) VALUES ('$cool',2,1,50, 0)";
        $niceu3 = $conn->query($oneq3);
    }
}

//vet inte ens vad detta är men lämnar det kommer inte ihåg
$amountcarrot = "SELECT * FROM orders WHERE customer_id='$cool' AND purchased=0";
$carrotamount = $conn->query($amountcarrot);
while ($dunder = $carrotamount->fetch_assoc()){
    foreach($carrotamount as $amountcart){
        $totalincart += $amountcart['amount'];
    }
}

if (isset($_POST['addToCart1'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    $quantity1 = $_POST['quantity1'];
    if ($quantity1 < 0){
        $errors['quantity1_bad_value'] = "Försök inte ens ";
    }else{
        if ($resultpupupu->num_rows > 0){ 
            $onepu11 = "UPDATE orders SET amount=amount+'$quantity1' WHERE     customer_id='$cool' AND product_id='3' AND purchased=0";
            $nicepu11 = $conn->query($onepu11);
        }else{
            $oneq11 = "INSERT INTO orders (customer_id,product_id,amount,price,     purchased) VALUES ('$cool',3,'$quantity1',50,0)";
            $niceu11 = $conn->query($oneq11);
        }
    }

    header("Refresh:0");

}


if (isset($_POST['addToCart2'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    $quantity2 = $_POST['quantity2'];
    if ($quantity2 < 0){
        $errors['quantity2_bad_value'] = "Försök inte ens ";
    }else{
        if ($resultpu->num_rows > 0){ 
            $onepu22 = "UPDATE orders SET amount=amount+'$quantity2' WHERE     customer_id='$cool' AND product_id='1' AND purchased=0";
            $nicepu22 = $conn->query($onepu22);
        }else{
            $oneq22 = "INSERT INTO orders (customer_id,product_id,amount,price,     purschased) VALUES ('$cool',1,'$quantity2',50, 0)";
            $niceu22 = $conn->query($oneq22);
        }   
    }
    
    header("Refresh:0");

}

if (isset($_POST['addToCart3'])){
    if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");}
    $quantity3 = $_POST['quantity3'];
    if ($quantity3 < 0){
        $errors['quantity3_bad_value'] = "Försök inte ens 🖕";
    }else{
        if ($resultpupu->num_rows > 0){ 
            $onepu33 = "UPDATE orders SET amount=amount+'$quantity3' WHERE     customer_id='$cool' AND product_id='2' AND purchased=0";
            $nicepu33 = $conn->query($onepu33);
        }else{
            $oneq33 = "INSERT INTO orders (customer_id,product_id,amount,price,     purchased) VALUES ('$cool',2,'$quantity3',50, 0)";
            $niceu33 = $conn->query($oneq33);
        }
    }
    header("Refresh:0");

}

if (isset($_POST['checkout_continue'])){
    $email_check = trim($_POST['email_check']);
    $first_name = trim($_POST['firstname_checkout']);
    $last_name = trim($_POST['lastname_checkout']);
    $user_city = trim($_POST['city_checkout']);
    $user_postcode = trim($_POST['postcode_checkout']);
    $user_method = trim($_POST['method_checkout']);
    $user_address = trim($_POST['address_checkout']);
    
    if(empty($email_check)){
        $errors['email_check_empty'] = "Din email är nödvändig.";
    }elseif(strlen($email_check) > 150){
        $errors['email_check_limit'] = "Din email har för många karaktärer.";
    }elseif($_SESSION['email'] != $email_check){
        $errors['email_not_same'] = "Email är inte samma som ditt konto.";
    }
    
    if(empty($first_name)){
        $errors['first_name_empty'] = "Ditt första namn är nödvändigt.";
    }elseif(strlen($first_name) > 150){
        $errors['first_name_check_limit'] = "Ditt första namn har för många karaktärer.";
    }
    
    if(empty($last_name)){
        $errors['last_name_empty'] = "Ditt sista namn är nödvändigt.";
    }elseif(strlen($last_name) > 150){
        $errors['last_name_check_limit'] = "Ditt andra namn har för många karaktärer.";
    }
    
    if(empty($user_city)){
        $errors['user_city_empty'] = "Din stad är nödvändig.";
    }elseif(strlen($user_city) > 150){
        $errors['city_check_limit'] = "Din stad har för många karaktärer.";
    }
    
    if(empty($user_postcode)){
        $errors['user_postcode_empty'] = "Din postkod är nödvändig.";
    }elseif(strlen($user_postcode) > 150){
        $errors['postcode_check_limit'] = "Din postkod har för många karaktärer.";
    }
    
    if(empty($user_method)){
        $errors['user_method_empty'] = "Välj metod.";
    }
    
    if (!filter_var($email_check, FILTER_VALIDATE_EMAIL)) {
        $errors['email_check_not'] = "Email adress är ogiltig.";
    }
    
    if(empty($user_address)){
        $errors['user_address_empty'] = "Din address är nödvändig.";
    }elseif(strlen($user_address) > 150){
        $errors['address_check_limit'] = "Din adress har för många karaktärer.";
    }

    if (count($errors) === 0) {
        $key = rand(100000,999999);
        $checkedout = 0;
        $sql = "INSERT INTO checkout (user_id, randomkey, checkedout, first_name, last_name, user_address, user_postcode, method, user_city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiissssis', $cool, $key, $checkedout, $first_name, $last_name, $user_address, $user_postcode, $user_method, $user_city);
    
        if ($stmt->execute()) {
            if($user_method==1){
                $_SESSION['coolkey'] = $key;
                $_SESSION['method'] = 1;
                header("location: https://promix-uf.se/shop/checkout1");
            }
            if($user_method==2){
                $_SESSION['coolkey'] = $key;
                $_SESSION['method'] = 2;
                header("location: https://promix-uf.se/shop/checkout2");
            }

        }else{
            $errors['db_checkout_error'] = "Databas fel: Kontakta admin.";
        }
        
        }
}

if (isset($_POST['checkout_end'])){
    $query = "SELECT * FROM orders WHERE customer_id='$cool' AND purchased=0";
    $nani = $conn->query($query);
    $products = $nani->fetch_assoc();
    $userEmail = $_SESSION['email'];
    $shooom = $_SESSION['coolkey'];
    $userName = $_SESSION['username'];
    sendCartMail($userEmail, $products, $totalcart, $cool);
    sendCartMailAdmin($userName,$cool, $products, $totalcart);
    $amazingquery = "UPDATE orders SET purchased=1 WHERE customer_id='$cool'";
    $wow = $conn->query($amazingquery);
    $amazingquery2 = "UPDATE checkout SET checkedout=1 WHERE user_id='$cool' AND randomkey='$shooom'";
    $wow2 = $conn->query($amazingquery2);
    $_SESSION['cool_order'] = "Du har nu beställt, titta i din mejl varukorg för kvitto och mer information.";
    header("location: https://promix-uf.se/shop");


    
    //1. fix array to checkout of current cart
    //2. mail function
    //3. change all of cart to purchased bool True or 1 couldve used tinyint doesnt matter.
    //4. fix cronjob to checkout false to be removed after two hours.
}

if (isset($_POST['message_btn'])){
    $topic = trim($_POST['topic_contact']);
    $message_contact = trim($_POST['message_contact']);
    if(!$_SESSION['username']){
        header("location: https://promix-uf.se/account/login");
    }else{
        if(empty($topic)){
            $errors['empty_topic'] = "Meddelande måste innehålla ämne.";
        }elseif (strlen($topic) > 100){
            $errors['topic_long'] = "Ämnet kan inte vara mer än 100 ord.";
        }
        if (empty($message_contact)){
            $errors['empty_message'] = "Meddelande måste innehålla minst 1 ord.";
        }elseif (strlen($message_contact) > 1000){
            $errors['message_long'] = "Meddelandet kan inte vara mer än 1000 ord.";
        }
    if(count($errors) === 0 ){
        $userName = $_SESSION['username'];
        SendMessage($userName,$cool,$topic,$message_contact);
        $message['contact_sent'] = "Meddelandet har nu skickats!";
        
    }
        
    }
}
