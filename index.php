<?php include 'account/authController.php'; ?>


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
    <link rel="icon" type="image/x-icon" href="uf.png" />
    <link rel="stylesheet" href="style.css" />
    <title>ProMix, ett UF-företag som säljer gott te!</title> 
    <meta data-rh="true" name="description" content="ProMix är ett UF företag som 
    jobbar med att sälja högkvalitativ dryck samt ge kunder den bästa uppplevelse från oss. 
    Vi vill att ni ska ha de bra och njuta av vårt fantastiska te">
    <meta name="content-language" content="sv">
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
          <img src="uf.png" alt="" width="50" />
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
                      <a href="https://promix-uf.se" class="nav-link text-center active fs-5">Hem</a>
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
                        <img src="default_avatar.png" width="40" alt="" class="me-2 rounded-circle">
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
          <img src="uf.png" alt="" width="50" />
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
                      <a href="https://promix-uf.se" class="nav-link text-center active fs-5">Hem</a>
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
                        <img src="monkey.jpg" width="40" alt="" class="me-2 rounded-circle">
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
    
    
    
    <section class="bg-dark p-5">
      <div class="container"></div>
    </section>
    <section class="bg-dark text-light p-5 text-center">
      <div class="container">
        <div class="d-lg-flex align-items-center hee">
          <div>
            <h1>
              <span class="text-danger fw-bold ">Sveriges bästa</span> sortiment av <b>Gott Te och dryck!</b>
            </h1>
            <p class="lead my-4">
              ProMix är ett UF företag som jobbar med att sälja högkvalitativ
              dryck samt ge kunder den bästa uppplevelse från oss. Vi vill att
              ni ska ha de bra och njuta av vårt fantastiska te.
            </p>
            <a href="https://promix-uf.se/shop" class="btn coolbtn btn-danger mt-3 btn-lg mb-5 fw-bold a"
            >Till Webbshop
            <i class="bi bi-chevron-right"></i>
          </a>
          </div>
          <img src="uf.png" class="img-fluid w-50 rotate" alt="ERROR" />
        </div>
      </div>
    </section>
    <!-- Header product overview -->
    <section class="bg-danger p-1">
      <div class="container"></div>
    </section>
    <section class="bg-dark text-light p-5">
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h3 class="mb-2 mb-md-0 fw-bold">Produkter</h3>
        </div>
      </div>
    </section>
    <!-- Product boxes -->
    <section class="p-3 ">
      <div class="container">
        <div class="row text-center">
          <div class="col-md my-3">
            <div class="card aza text-light h-100">
              <div class="card-body d-flex text-center flex-column">
                <div class="h1 mb-3">
                  <i class="bi bi-cup"></i>
                </div>
                <h3 class="card-title mb-3 fw-bold">Godis te, 100g</h3>
                <p class="card-text">Om du vill ha något gott du kan njuta på under påsklovet och fungerar bra till fika, eller om du bara vill utmana smaksinnet. Med smak av choklad och frukt kommer det enkelt lämna en varm och god smak på tungan! </p>
                <a href="https://promix-uf.se/shop/1" class="btn coolbtn btn-danger mt-auto fw-bold z">Läs mer...</a>
              </div>
            </div>
          </div>
          <div class="col-md my-3">
            <div class="card aza text-light h-100">
              <div class="card-body d-flex text-center flex-column">
                <div class="h1 mb-3">
                  <i class="bi bi-cup"></i>
                </div>
                <h3 class="card-title mb-3 fw-bold">Ekologiskt Frukt Te, 100g</h3>
                <p class="card-text">
                  Frukt te som innehåller päron, ingefära, äpple, nypon,
                  hibiskus, ananas och kokos. Gott som iste och fungerar bra när
                  man är sjuk.
                </p>
                <a href="https://promix-uf.se/shop/2" class="btn coolbtn btn-danger mt-auto fw-bold z" >Läs mer...</a>
              </div>
            </div>
          </div>
          <div class="col-md my-3">
            <div class="card aza text-light h-100">
              <div class="card-body d-flex text-center flex-column">
                <div class="h1 mb-3">
                  <i class="bi bi-cup"></i>
                </div>
                <h3 class="card-title mb-3 fw-bold">Grönt chai te, 100g</h3>
                <p class="card-text">
                Klassiskt grönt chai te. Anti inflammotorisk med antioxidanter och lugnande. Har smaken av kanel och grönt te.

                </p>
                <a href="https://promix-uf.se/shop/3" class="btn coolbtn btn-danger mt-auto fw-bold z">Läs mer...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About -->
    <span id="omoss" class="anchor"></span>
    <section id="omoss" class="p-5">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <i class="bi bi-wrench"></i>
            <img src="" alt="Bild kommer snart" class="img-fluid" />
          </div>
          <div class="col-md p-5">
            <h2 class="fw-bold" >Om Promix</h2>
            <p class="lead">
              ProMix är ett UF företag som startades av Måns Karlström och Harry Bhuddi. 
              Företaget började i Oktober av 2021 och började sin produktion i December.
              Företaget arbetar för att sälja te i olika teman för ett bra pris.
            </p>
            <p class="lead">
              Vi älskar att kommunicera med våra kunder som man får möta unika personligheter varje dag.
              Vi har ambition med att driva företag och te är något vi båda gillar. Ge te en chans och beställ från oss idag.
            </p>
            <a href="https://promix-uf.se/contact" class="btn coolbtn btn-danger mt-3 fw-bold a"
              >Kontakt
              <i class="bi bi-chevron-right"></i>
            </a>
            <a href="https://ungforetagsamhet.se/company/promix-uf" class="btn coolbtn btn-danger mt-3 fw-bold a"  target="_blank"

              >Ung Företagsamhet
<i class="bi bi-box-arrow-up-right"></i>            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Employees -->
    <span id="anstallda" class="anchor"></span>
    <section id="personer" class="p-5 bg-dark">
      <div class="container">
        <h2 class="text-center text-white fw-bold">Vilka är vi?</h2>
        <p class="lead text-center text-secondary mb-5">
          Lär dig mer om oss som personer
        </p>
        <div class="row g-4 justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 bg-light">
              <div class="card-body text-centerd-flex flex-column justify-content-center">
                <img
                  src="harry.jpg"
                  alt="Profilbild kommer snart"
                  class="rounded-circle mb-3 w-50 a"
                />
                <h3 class="card-title mb-3"><b>Person 1</b></h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus incidunt vitae quaerat deserunt voluptates nisi reprehenderit ipsum aut consequatur perferendis sed eveniet rem facere, expedita vero qui fugit nemo animi.
                </p>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle ayyy"
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-instagram"></i
                ></a>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle ayyy"
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-linkedin text-dark"></i
                ></a>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle ayyy"
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-facebook"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 bg-light">
              <div class="card-body text-center flex-column justify-content-center">
                <img
                  src="IMG_20200828_102505~2.jpg"
                  alt="Profilbild kommer snart"
                  class="rounded-circle mb-3 w-50 a"
                />
                <h3 class="card-title mb-3"><b>Person 2</b></h3>
                <p class="card-text">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure totam officia doloremque accusantium consectetur sit nemo quos reprehenderit fugiat, omnis aliquam magni ipsum voluptatibus assumenda dolore incidunt possimus inventore ea.
                </p>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle ayyy "
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-instagram"></i
                ></a>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle mt-auto ayyy"
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-linkedin"></i
                ></a>
                <a
                  class="btn btn-link text-dark btn-outline-light rounded-circle mt-auto ayyy"
                  href=""
                  role="button"
                  target="_blank"
                  ><i class="bi bi-github"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<span id="bilder" class="anchor"></span>
    <div id="bilder" class="container">
      <h2 class="text-center text-dark mt-5 fw-bold">Bilder</h2>
      <p class="lead text-center text-secondary mb-5">
        Här kan du se bilder från våran process
      </p>
      <div class="row g-4 justify-content-center"></div>
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://www.mantra-cbd.co.uk/wp-content/uploads/2020/10/coming-soon-cbd.jpg"
              class="img-fluid d-block w-70 mx-auto"
              alt="fel"
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://www.mantra-cbd.co.uk/wp-content/uploads/2020/10/coming-soon-cbd.jpg"
              class="img-fluid d-block w-70 mx-auto"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://www.mantra-cbd.co.uk/wp-content/uploads/2020/10/coming-soon-cbd.jpg"
              class="img-fluid d-block w-70 mx-auto"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
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
