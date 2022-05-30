<?php include 'authController.php'; ?>

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
    <title>Glömt lösenordet? - ProMix</title>
  </head>
  <body class="text-center bg-dark">
    <!-- Navbar -->
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
    <!-- Forgot password form -->
    <section class="p-5"></section>
    <section id="cover" class="min-vh-100">
      <div class="container">
        <div class="row text-white">
          <div
            class="
              col-xl-5 col-lg-6 col-md-8 col-sm-10
              mx-auto
              text-center
              form
              p-4
            "
          >
            <div class="px-1">
              <form method="post" action="forgotpassword" class="form-inline justify-content-center align-middle ">
                <img
                  src="/uf.png"
                  alt=""
                  class="img-fluid mb-1"
                  style="width: 200px;"
                />
                <h1 class="h1 fw-normal text-light">Glömt lösenordet?</h1>
                <p class=" text-secondary">Skriv in din email nedan så får du en 
                länk till där du kan ändra ditt lösenord.</p>
                <?php if($_SESSION['message']): ?>
                  <div class="alert alert-success" style="border-top-width: 5px;">
                     <div class="container p-0">
                     <p class="mb-0">
                       <i class="bi bi-check-circle-fill"></i> <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                      </p>
                     </div>
                  </div>
                <?php endif; ?>
                <div class="form-floating text-align-center mt-4">
                  <input
                    type="email"
                    name="email"
                    class="form-control <?php if($errors['email'] or $errors['emailnot']): ?><?php echo 'is-invalid'; ?><?php endif; ?>"
                    placeholder="DarkHorse1"
                    
                  />
                  <label class="text-dark" for="email">Email</label>
                  <div id="1" class="invalid-feedback">
                       <?php if($errors['emailnot'] and $errors['email']){
                            echo $errors['email']; 
                            }else{
                            echo $errors['emailnot'];
                            }?>
                  </div>
                </div>
                  <button type="submit" name="forgotpassword" href="" class="btn coolbtn btn-lg btn-danger w-100 mt-4">Skicka länk</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead "> <small>Copyright &copy 2021-2022 ProMix UF</small></p>        <a
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
