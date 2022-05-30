<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php"; ?>


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
    <title>Webbshopp - ProMix</title> 
    <meta data-rh="true" name="description" content="ProMix är ett UF företag som 
    jobbar med att sälja högkvalitativ dryck samt ge kunder den bästa uppplevelse från oss. 
    Vi vill att ni ska ha de bra och njuta av vårt fantastiska te">
    <meta data-rh="true" name="keywords" content="Uf företag, te, promix, gott te, frukt te, iste, rooibos te, allt te, bästa hemsida uf företag">
    <meta data-rh="true" property="og:url" content="https://www.promix-uf.se/">
  </head>
  <body class="text-center">
  
  
  
<?php if (!$_SESSION['username']): ?>
   <!-- Navbar guest  -->
    <nav
      class="navbar fixed-top navbar-dark bg-dark "
      aria-label="Main navigation"
    >
      <div class="container">
        <a class="navbar-brand" id="#" href="https://www.promix-uf.se">
          <img src="/uf.png" alt="" width="50" />
          <b>ProMix</b></a
        >
        <button
  class="navbar-toggler collapsed p-0 border-0"
  type="button"
  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
  aria-label="Toggle navigation"
  aria-expanded="false"
>
          <!-- Ändra senare ikon till hru den ser ut -->
          <span class="navbar-toggler-icon"></span>        </button>

          <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" >
            <div class="offcanvas-header pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col d-flex justify-content-center pl-0 mt-auto">
                            <h5 id="offcanvasRightLabel" class="mb-0 text-light"><b>Meny</b></h5>
                        </div>
                        <div class="col d-flex justify-content-end mt-auto">
                            <button type="button" class="btn-close btn-lg text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="filter:invert(100%);"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body d-flex flex-column pt-0">
              <hr class="text-light">
              <ul class="nav navbar-nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                      <a href="https://promix-uf.se" class="nav-link text-center fs-5">Hem</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/shop" class="nav-link text-center active fs-5">Webbshopp</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/contact" class="nav-link text-center fs-5">Kontakt</a>
                  </li>
              </ul>
              <hr class="text-light">
              <div class="btn-group dropup mx-auto">
                  <a id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" href="" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle">
                        <img src="/default_avatar.png" width="40" alt="" class="me-2 rounded-circle">
                        <strong>Profil</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser" data-popper-placement="top-start">
                    <li>
                        <a href="https://promix-uf.se/account/login" class="dropdown-item">
                            Logga in
                        </a>
                    </li>
                    <li>
                        <a href="https://promix-uf.se/account/" class="dropdown-item" >Registrering</a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
      </div>
    </nav>
<?php else: ?>
    <nav
      class="navbar fixed-top navbar-dark bg-dark "
      aria-label="Main navigation"
    >
      <div class="container">
        <a class="navbar-brand" id="#" href="https://www.promix-uf.se">
          <img src="/uf.png" alt="" width="50" />
          <b>ProMix</b></a
        >
        <button
  class="navbar-toggler collapsed p-0 border-0"
  type="button"
  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
  aria-label="Toggle navigation"
  aria-expanded="false"
>
          <span class="navbar-toggler-icon"></span>        </button>

          <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" >
            <div class="offcanvas-header pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col d-flex justify-content-center pl-0 mt-auto">
                            <h5 id="offcanvasRightLabel" class="mb-0 text-light"><b>Meny</b></h5>
                        </div>
                        <div class="col d-flex justify-content-end mt-auto">
                            <button type="button" class="btn-close btn-lg text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="filter:invert(100%);"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body d-flex flex-column pt-0">
              <hr class="text-light">
              <ul class="nav navbar-nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                      <a href="https://promix-uf.se" class="nav-link text-center fs-5">Hem</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/shop" class="nav-link text-center active fs-5">Webbshopp</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/contact" class="nav-link text-center fs-5">Kontakt</a>
                  </li>
              </ul>
              <hr class="text-light">
              <div class="btn-group dropup mx-auto">
                  <a id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" href="" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle">
                        <img src="/monkey.jpg" width="40" alt="" class="me-2 rounded-circle">
                        <strong><?php echo ($_SESSION['username']); ?></strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser" data-popper-placement="top-start">
                    <li>
                        <a href="https://promix-uf.se/account/mypage/settings" class="dropdown-item">
                            Inställningar
                        </a>
                    </li>
                    <li>
                        <a href="https://promix-uf.se/account/mypage/profile" class="dropdown-item">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="https://promix-uf.se/account/mypage/dashboard" class="dropdown-item">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" style="margin-top: 10px;margin-bottom: 10px;">
                    </li>
                    <li>
                        <a href="?logout=1" class=" logout dropdown-item" >Logga ut</a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
      </div>
    </nav>
<?php endif; ?>
<div class="p-5 bg-dark"></div>
    <div class="min-vh-100 bg-dark text-light">
        <div class="container">
            <h1><b>Webbshopp</b></h1>
            <hr class="text-light">
                <div class="text-end fs-3 me-2 mb-3"><a href="cart"><i class="bi bi-bag-fill text-light"><span class="position-absolute translate-middle badge rounded-pill bg-danger" style="font-size: 13px;"><?php echo $totalincart ?></i></a></div>
                <div class="row rounded aza">
                    <div class="col-lg mt-5"><img src="/40234.jpg" alt="" class="w-50 justify-content-center mb-3"></div>
                        <div class="col mt-1"><h1 class="fw-bold ">Ekologiskt frukt te, 100g</h1>
                            <div class="p-3 text-light "><p><span class="fst-italic lh-lg">Ett superrr iste!</span><br>
                            Frukt te som innehåller päron, ingefära, äpple, nypon, hibiskus, ananas och kokos. Gott som iste och fungerar bra när man är sjuk. </p>
                        <p class="fw-bold"><i class="bi bi-box-seam"></i> 10 st i lager</p>
                        <p class="fw-bold text-danger fs-1 font-monospace">50 kr</p>
                        <div class="d-inline">
                            <form method="post" action="2">                            <input type="number" step="1" min="1" max="10" value="1" name="quantity2" class=" quantity-field form-control w-50 text-center mx-auto <?php if($errors['quantity2_bad_value']): ?><?php echo 'is-invalid'; ?><?php endif; ?>">
                                              <div id="2" class="invalid-feedback">
                    <?php echo $errors['quantity2_bad_value']; ?>
                  </div>
                            <button type="submit" name="addToCart2" class="mt-3 w-50 btn btn-danger coolbtn ">
                                    Lägg i varukorg</button>
                                    </form>
                        </div>
                        </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills justify-content-center mt-5" id="myTab" role="tablist">
                        <li class="nav-item aza rounded" role="presentation">
                          <button class="nav-link active link-secondary " id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">Information</button>
                        </li>
                        <li class="nav-item aza rounded" role="presentation">
                          <button class="nav-link link-secondary" id="include-tab" data-bs-toggle="tab" data-bs-target="#include" type="button" role="tab" aria-controls="include" aria-selected="false">Innehållsförteckning</button>
                        </li>

                      </ul>
                      <div class="tab-content aza p-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab"> <span class="fw-bold">Nettovikt:</span> 100 gram. <br> <span class="fw-bold">Förvaras:</span> Torrt i sin förpackning, ej högre än 25 grader °C. <br><span class="fw-bold">Bruksanvisning:</span> Frukt-, ört- och kryddblandningar ska bryggas med kokande vatten och måste dra i minst 5 minuter. Detta är nödvändigt för att produkten ska vara säker. <br>Kontakta <span class="fw-bold text-danger">info@promix-uf.se</span> om du har frågor. </div>
                        <div class="tab-pane fade" id="include" role="tabpanel" aria-labelledby="include-tab"><span class="fw-bold">Ingredienser:</span> Vildäpple*, äppelbitar*, ingefära*, nyponskal*, hibiskus*, citrusskal*, päronbitar*, naturlig fruktarom, ananasgranuler (koncentrerad ananasjuice*, majsstärkelse*), naturlig kryddarom, ringblomsblad*. /*Certifierad ekologisk produkt från icke EU-jordbruk. (SE-EKO-01)</div>
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