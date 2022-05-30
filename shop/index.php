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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
<?php if($message['successfully_ordered']): ?>
    <div class="alert alert-success alert-dismissible fade show position-absolute w-100 mb-0" role="alert">
                <i class="bi bi-check-circle-fill"></i> <?php echo $message['successfully_ordered']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>
    <div class="min-vh-100 bg-dark text-light">
        <div class="container">
            <h1><b>Webbshopp</b></h1>
            <hr class="text-light">
                <div class="text-end fs-3 me-2 mb-3"><a href="cart"><i class="bi bi-bag-fill text-light"><span class="position-absolute translate-middle badge rounded-pill bg-danger" style="font-size: 13px;"><?php echo $totalincart ?></i></a></div>
            <section class="p-5 bg-dark rounded">
                <div class="row text-center">
                    <div class="col-md mb-3">
                      <div class="card text-light h-100 aza border-0 rounded ">
                        <a href="1" class="text-light text-decoration-none mb-3"><img class="card-img-top" src="/8313.jpg" alt="Bild ett">
                            <div class="card-body d-flex text-center flex-column">
                              <h3 class="card-title mb-3 fw-bold">Godis te, 100g</h3>
                              <p class="card-text">Om du vill ha något gott du kan njuta på under påsklovet och fungerar bra till fika, eller om du bara vill utmana smaksinnet. Med smak av choklad och frukt kommer det enkelt lämna en varm och god smak på tungan! </p></a>
                            <form action="" method="post" class="mt-auto">
                            <button type="submit" name="shop_one" class="btn coolbtn btn-danger fw-bold z w-100">Lägg i varukorg</button>
                            </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md mb-3">
                      <div class="card text-light h-100 aza border-0 rounded">
                        <a href="2" class="text-light text-decoration-none mb-3"><img class="card-img-top" src="/40234.jpg" alt="Bild två">
                            <div class="card-body d-flex text-center flex-column">
                              <h3 class="card-title mb-3 fw-bold">Ekologiskt Frukt Te, 100g</h3>
                              <p class="card-text">
                                Frukt te som innehåller päron, ingefära, äpple, nypon,
                                hibiskus, ananas och kokos. Gott som iste och fungerar bra när
                                man är sjuk.
                              </p></a>
                            <form action="" method="post" class="mt-auto">
                            <button type="submit" name="shop_two" class="btn coolbtn btn-danger fw-bold z w-100">Lägg i varukorg</button>
                            </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md mb-3">
                      <div class="card text-light h-100 aza border-0 rounded">
                        <a href="3" class="text-light text-decoration-none mb-3"><img class="card-img-top" src="/8565.jpg" alt="Bild tre">
                            <div class="card-body d-flex text-center flex-column">
    
                              <h3 class="card-title mb-3 fw-bold">Grönt chai te, 100g</h3>
                              <p class="card-text">
                                Klassiskt grönt chai te. Anti inflammotorisk med antioxidanter och lugnande. Har smaken av kanel och grönt te.
                              </p></a>
                            <form action="" method="post" class="mt-auto">
                            <button type="submit" name="shop_three" class="btn coolbtn btn-danger fw-bold z w-100">Lägg i varukorg</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </section>
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