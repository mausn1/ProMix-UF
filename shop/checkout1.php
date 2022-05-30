<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php"; 
if (!$_SESSION['username']) {
    header('location: https://promix-uf.se/account/login');
} 
if ($resultu->num_rows <= 0) {
    header('location: https://promix-uf.se/shop');
}
if ($_SESSION['method'] == 2){
    header('location: https://promix-uf.se/shop/checkout2');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/uf.png" />
    <link rel="stylesheet" href="/style.css" />
    <title>Checkout - ProMix</title> 
    <meta data-rh="true" name="description" content="ProMix är ett UF företag som 
    jobbar med att sälja högkvalitativ dryck samt ge kunder den bästa uppplevelse från oss. 
    Vi vill att ni ska ha de bra och njuta av vårt fantastiska te">
    <meta data-rh="true" name="keywords" content="Uf företag, te, promix, gott te, frukt te, iste, rooibos te, allt te, bästa hemsida uf företag">
    <meta data-rh="true" property="og:url" content="https://www.promix-uf.se/">
  </head>
  <body class="text-center">
    <div class="p-5 bg-dark"></div>
        <div class="min-vh-100 bg-dark text-light">
            <div class="container">
                <h1><b>Checkout</b></h1>
                <hr class="text-light mb-5">
                <form action="" method="post">
                    <h3 class="lead">VIKTIGT! Skriv ner denna kod: <?php echo $_SESSION['coolkey']; ?> </h3>
                    <p class="lead">Totala kostnaden blir <?php echo $totalcart; ?> kr, tryck på "Beställ" och vi hör av oss via mejl!</p>
                    <div class="p-1 d-flex justify-content-end ">
                      <button class="btn btn-lg btn-danger coolbtn mt-3" name="checkout_end" type="submit">Beställ</button>
                    </div>
                </form>
                </div>     
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead"> <small>Copyright &copy 2021-2022 ProMix UF</small>  </p>        <a
          class="btn btn-link text-light btn-dark"
          href="https://www.instagram.com/promixuf/"
          role="button"
          target="_blank"
          
          ><i class="bi bi-instagram"></i
        ></a>
      </div>
    </footer>
    <!-- Bootstrap bundle -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>