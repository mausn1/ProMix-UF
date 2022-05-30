<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/uf.png" />
    <link rel="stylesheet" href="/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />
    <title>Kontakt - ProMix</title>
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
                    <a href="https://promix-uf.se/shop" class="nav-link text-center fs-5">Webbshopp</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/contact" class="nav-link text-center active fs-5">Kontakt</a>
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
                    <a href="https://promix-uf.se/shop" class="nav-link text-center fs-5">Webbshopp</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://promix-uf.se/contact" class="nav-link text-center active fs-5">Kontakt</a>
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
    <!-- Open section -->
    <section class="bg-dark d-flex min-vh-100">
        <div class="container hee">
            <div class="p-4"></div>
            <img src="/uf.png" class="img-fluid  mx-auto d-block mt-5 pt-5" alt="" style="width: 200px;">
            <h1 class="h1 fw-normal text-light fw-bold">Kontakt</h1>

            <p class="lead text-center text-secondary">Vi är här om du behöver oss</p>
            <p class="lead mt-5 text-white text-center">
              <i class="bi bi-envelope"></i> info@promix-uf.se
            </p>
            <p class="lead text-white text-center">
              <i class="bi bi-wrench"></i> Formulär på väg
            </p>
            </div>
    </section>

    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy 2021-2022 ProMix UF</p>        <a
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
