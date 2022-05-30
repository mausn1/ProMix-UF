<?php

require_once 'vendor/autoload.php';
require_once 'constants.php';
require_once 'db.php';

session_start();

// Create the Transport
$transport = (new Swift_SmtpTransport('mail.promix-uf.se', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Verifiera email</title>
    <style>
      .wrapper {
        padding: 20px;
        color: black;
        font-size: 1.3em;
        font-family: "Lucida Console", "Courier New", monospace;
        margin: auto;
        text-align: center;
      }
      .tot {
        background-color: lavender;
        width: 300px;
        border: 15px solid darkred;
        padding: 50px;
        margin: 20px;
        text-align: center;
        font-family: "Lucida Console", "Courier New", monospace;
      }
      .center {
        margin: auto;
        padding: 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <p>
        Tack för du registrar dig på våran sida! Klick länken nedan för
        verifiera din email! OBS! Du har endast 2 timmar innan länken löper ut.
      </p>
      <div class="center">
        <a
        style="color:darkred;"
        href="http://promix-uf.se/account/welcome?token=' . $token . '"
        >Verifiera Email</a
      >
      </div>
      <div class="center">
        <p>Vänliga hälsningar av Måns - Adminstrator hos ProMix</p>
        <p>OBS! Denna mejl svarar ej och om du har problem kan du skicka till info@promix.se</p>
      </div>
    </div>
  </body>
</html>

';

    $message = (new Swift_Message('Verifiera din email hos ProMix'))
        ->setFrom([EMAIL => 'ProMix verifikation'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function verifyEmail($token)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['message'] = "Din email har verifierats! Du kan nu logga in.";
            $_SESSION['type'] = "alert-success";
            $_SESSION['icon1'] = "bi-check-circle-fill";
            header('location: login');
        }
    } else {
        $_SESSION['message2'] = "Användare hittades inte";
        $_SESSION['icon2'] = "bi-exclamation-circle-fill";
        header('location: login');

    }
}

function sendPasswordResetLink($userEmail, $token) 

  {
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <title>Reset lösenord</title>
        <style>
          .wrapper {
            padding: 20px;
            color: black;
            font-size: 1.3em;
            font-family: "Lucida Console", "Courier New", monospace;
            margin: auto;
            text-align: center;
          }
          .tot {
            background-color: lavender;
            width: 300px;
            border: 15px solid darkred;
            padding: 50px;
            margin: 20px;
            text-align: center;
            font-family: "Lucida Console", "Courier New", monospace;
          }
          .center {
            margin: auto;
            padding: 10px;
            text-align: center;
          }
        </style>
      </head>
      <body>
        <div class="wrapper">
          <p>
            Hej där! Du har fått en mejl för att återställa ditt lösenord, vänligen tryck länken här under! OBS du har endast 2 timmar innan länken löper ut.
          </p>
          <div class="center">
            <a
            style="color:darkred;"
            href="http://promix-uf.se/account/welcome?password-token=' . $token . '"
            >Ändra lösenord</a
          >
          </div>
          <div class="center">
            <p>Vänliga hälsningar av Måns - Adminstrator hos ProMix</p>
            <p>OBS! Denna mejl svarar ej och om du har problem kan du skicka till info@promix.se</p>
          </div>
        </div>
      </body>
    </html>
';

    $message = (new Swift_Message('Verifiera din email hos ProMix'))
        ->setFrom([EMAIL => 'ProMix verifikation'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function sendCartMail($userEmail, $products, $totalcart) 

  {
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <title>Kvitto</title>
        <style>
          .wrapper {
            padding: 20px;
            color: black;
            font-size: 1.3em;
            font-family: "Lucida Console", "Courier New", monospace;
            margin: auto;
            text-align: center;
          }
          .tot {
            background-color: lavender;
            width: 300px;
            border: 15px solid darkred;
            padding: 50px;
            margin: 20px;
            text-align: center;
            font-family: "Lucida Console", "Courier New", monospace;
          }
          .center {
            margin: auto;
            padding: 10px;
            text-align: center;
          }
        </style>
      </head>
      <body>
      <body>
        <div class="wrapper">
          <p>
            Hej där! Tack för du beställer från våran sida! Du får snart en mejl inom MAX 3 dagar för ytterligare info beroende på vilken metod du valde.
          </p>
          <div class="center">
              <p>Du har beställt produkter för '.$totalcart.' kr. Titta vid din profil för mer info eller kontakta oss.</p>
          </div>
          <div class="center">
            <p>Vänliga hälsningar av Måns - Adminstrator hos ProMix</p>
            <p>OBS! Denna mejl svarar ej och om du har problem kan du skicka till info@promix.se</p>
          </div>
        </div>
      </body>
      </body>
    </html>'; 

    $message = (new Swift_Message('Kvitto'))
        ->setFrom([EMAIL => 'ProMix beställning'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function sendCartMailAdmin($userName, $cool, $products, $totalcart) 

  {
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <title>Info om beställning</title>
        <style>
          .wrapper {
            padding: 20px;
            color: black;
            font-size: 1.3em;
            font-family: "Lucida Console", "Courier New", monospace;
            margin: auto;
            text-align: center;
          }
          .tot {
            background-color: lavender;
            width: 300px;
            border: 15px solid darkred;
            padding: 50px;
            margin: 20px;
            text-align: center;
            font-family: "Lucida Console", "Courier New", monospace;
          }
          .center {
            margin: auto;
            padding: 10px;
            text-align: center;
          }
        </style>
      </head>
      <body>
        <div class="wrapper">
          <p>
            '.$userName.' eller user '.$cool.' har beställt via ProMix sidan för '.$totalcart.' kr.
          </p>
        </div>
      </body>
    </html>'; 

    $message = (new Swift_Message('Info om beställning'))
        ->setFrom([EMAIL => 'ProMix beställning'])
        ->setTo('karlstrom112@gmail.com')
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function sendMessage($userName, $cool, $topic, $message_contact) 

  {
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <title>Meddelande</title>
        <style>
          .wrapper {
            padding: 20px;
            color: black;
            font-size: 1.3em;
            font-family: "Lucida Console", "Courier New", monospace;
            margin: auto;
            text-align: center;
          }
          .tot {
            background-color: lavender;
            width: 300px;
            border: 15px solid darkred;
            padding: 50px;
            margin: 20px;
            text-align: center;
            font-family: "Lucida Console", "Courier New", monospace;
          }
          .center {
            margin: auto;
            padding: 10px;
            text-align: center;
          }
        </style>
      </head>
      <body>
        <div class="wrapper">
          <p>
            '.$userName.' eller user '.$cool.' har skickat ett meddelande.
          </p>
          <h3>'.$topic.'</h3>
          <p>'.$message_contact.'</p>
        </div>
      </body>
    </html>';; 

    $message = (new Swift_Message('Ett meddelande har skickats'))
        ->setFrom([EMAIL => 'ProMix auto-meddelanden'])
        ->setTo('karlstrom112@gmail.com')
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}