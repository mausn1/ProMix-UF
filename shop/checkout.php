<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php"; 
if (!$_SESSION['username'] ) {
    header('location: https://promix-uf.se/account/login');
}
if ($resultu->num_rows <= 0) {
    header('location: https://promix-uf.se/shop');
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
                                    <?php if($errors['db_checkout_error']): ?>
                  <div class="alert alert-danger" style="border-top-width: 5px;">
                     <div class="container p-0">
                        <p class="mb-0">
                            <i class="bi bi-exclamation-circle-fill"></i> <?php echo $errors['db_checkout_error'] ?>
                        </p>
                     </div>
                  </div>
                <?php endif; ?>
                    <div class="row mb-5">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" id="nameCheckout" class="form-control <?php if($errors['email_check_empty'] or $errors['email_check_limit'] or $errors['email_not_same']): ?><?php echo 'is-invalid'; ?><?php endif; ?>" name="email_check">
                                <label for="emailCheckout" class="text-dark">Kontrollera email</label>
                                <div id="1" class="invalid-feedback"><?php echo $errors['email_check_empty']; echo $errors['email_check_limit']; echo $errors['email_not_same']; ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-floating">                    
                        <select class="form-select <?php if($errors['user_method_empty']): ?><?php echo 'is-invalid'; ?><?php endif; ?>" id="floatingSelect" name="method_checkout" aria-label="">
                            <option value="1" selected>Hämta och betala på plats</option>
                            <option value="2">Betala med Swish och skicka genom PostNord</option>
                        </select> 
                        <label for="floatingSelect" class="text-dark">Välj metod</label>
                        <div id="2" class="invalid-feedback"><?php echo $errors['user_method_empty']; ?></div>
                    </div>
                    <div class="row mt-5">
                      <div class="col">
                          <div class="form-floating">
                              <input type="text" name="firstname_checkout" class="form-control <?php if($errors['first_name_empty'] or $errors['first_name_check_limit']): ?><?php echo 'is-invalid'; ?><?php endif; ?>" id="nameCheckout">
                              <label for="nameCheckout" class="text-dark">Förnamn</label>
                              <div id="3" class="invalid-feedback"><?php echo $errors['first_name_empty']; echo $errors['first_name_check_limit']; ?></div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-floating">
                              <input type="text" id="lastnameCheckout" name="lastname_checkout" class="form-control <?php if($errors['last_name_empty'] or $errors['last_name_check_limit']): ?><?php echo 'is-invalid'; ?><?php endif; ?>">
                              <label for="lastnameCheckout" class="text-dark">Efternamn</label>
                              <div id="4" class="invalid-feedback"><?php echo $errors['last_name_empty']; echo $errors['last_name_check_limit']; ?></div>
                          </div>
                      </div>
                  </div>

                  <div class="row mt-5">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="adressCheckout" name="address_checkout" class="form-control <?php if($errors['user_address_empty'] or $errors['address_check_limit']): ?><?php echo 'is-invalid'; ?><?php endif; ?>">
                            <label for="adressCheckout" class="text-dark">Address</label>
                            <div id="5" class="invalid-feedback"><?php echo $errors['user_address_empty']; echo $errors['address_check_limit']; ?></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="city_checkout" id="cityCheckout" class="form-control <?php if($errors['user_city_empty'] or $errors['city_check_limit']): ?><?php echo 'is-invalid'; ?><?php endif; ?>">
                            <label for="cityCheckout" class="text-dark">Stad</label>
                            <div id="6" class="invalid-feedback"><?php echo $errors['user_city_empty']; echo $errors['city_check_limit']; ?></div>
                        </div>
                    </div>
                    <div class="col">
                      <div class="form-floating">
                          <input type="text" name="postcode_checkout" id="postcodeCheckout" class="form-control <?php if($errors['user_postcode_empty'] or $errors['postcode_check_limit']): ?><?php echo 'is-invalid'; ?><?php endif; ?>">
                          <label for="postcodeCheckout" class="text-dark">Postkod</label>
                          <div id="7" class="invalid-feedback"><?php echo $errors['user_postcode_empty']; echo $errors['postcode_check_limit']; ?></div>
                      </div>
                  </div>
                </div>
                    <div class="p-1 d-flex justify-content-end ">
                      <button type="submit" class="btn btn-lg btn-danger coolbtn mt-3" name="checkout_continue">Gå vidare</button>
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