<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php";
if (!$_SESSION['username']) {
    header('location: https://promix-uf.se');
} ?>
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
    <title>Mina sidor - ProMix</title>
  </head>
  <body>
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
                        <img src="/monkey.jpg" width="40" alt="" class="me-2 rounded-circle">
                        <strong><?php echo ($_SESSION['username']); ?></strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser" data-popper-placement="top-start">
                    <li>
                        <a href="https://promix-uf.se/account/mypage/settings" class=" active dropdown-item">
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
    <section class="p-5 bg-dark"></section>
    
    <section class="min-vh-100 bg-dark text-center">
        <div class="container">
            <div class="row">
                <div class="col-md">
                        <div class="d-flex flex-column ">
                            <a href="https://promix-uf.se/account/mypage/settings/" class="text-light text-decoration-none" onselectstart=" false;"><div class="p-2 aja rounded bg-danger">Redigera profil</div></a>
                            <a href="https://promix-uf.se/account/mypage/settings/edit-privacy" class="text-secondary text-decoration-none" onselectstart=" false;"><div class="p-2 aja rounded">Privacy & säkerhet</div></a>
                            <a href="https://promix-uf.se/account/mypage/settings/change-password" class="text-secondary text-decoration-none mb-5" onselectstart=" false;"><div class="p-2 aja rounded">Ändra lösenord</div></a>
                        </div>
                </div>
                <div class="col-md-7"> 
                 <?php if($errors['database_error']): ?>
                  <div class="alert alert-danger" style="border-top-width: 5px;">
                     <li class="list-unstyled">
                       <i class="bi bi-exclamation-circle-fill"></i> <?php echo $errors['database_error']; ?>
                      </li>
                  </div>
                <?php endif; ?>
                    <form action="edit-settings"  method="post">
                        <div class="form-floating">
                        <input name="username" type="text" class="form-control <?php if($errors['username'] or $errors['database_error'] or $errors['usernameexist'] or $errors['usernamenot']): ?><?php echo 'is-invalid'; ?><?php endif; ?> <?php if($message['changed1']): ?><?php echo 'is-valid'; ?><?php endif; ?>" value="<?php echo ($_SESSION["username"]); ?>">
                            <label class="text-dark" for="username">Användarnamn</label>
                        <div id="1" class="invalid-feedback">
                            <?php echo $errors['username']; echo $errors['usernameexist']; echo $errors['usernamenot'];  ?>
                        </div>
                        <div id="11" class="valid-feedback">
                            <?php echo $message['changed1']; ?>
                        </div>
                        </div>
                        <div class="form-floating">
                        <input name="email" type="text" class="form-control mt-3 <?php if($errors['email'] or $errors['database_error'] or $errors['emailexist'] or $errors['emailnot']): ?><?php echo 'is-invalid'; ?><?php endif; ?><?php if($message['changed2']): ?><?php echo 'is-valid'; ?><?php endif; ?>" value="<?php echo ($_SESSION["email"]); ?>">
                            <label class="text-dark" for="email">Email</label>
                        <div id="2" class="invalid-feedback">
                            <?php echo $errors['emailexist']; if($errors['emailnot'] and $errors['email']){
                            echo $errors['email']; 
                            }else{
                            echo $errors['emailnot'];
                            }?>
                        </div>
                        <div id="22" class="valid-feedback">
                            <?php echo $message['changed2']; ?>
                        </div>
                        </div>
                        <div class="form-floating">
                        <textarea rows="5" style="height: 100%;" name="bio" type="text" class="form-control mt-3 <?php if($errors['bionot'] or $errors['database_error']): ?><?php echo 'is-invalid'; ?><?php endif; ?> <?php if($message['changed3']): ?><?php echo 'is-valid'; ?><?php endif; ?>"><?php echo $_SESSION["bio"]; ?></textarea>
                            <label class="text-dark" for="bio">Biografi</label>
                        <div id="3" class="invalid-feedback">
                            <?php echo $errors['bionot']; ?>
                        </div>
                        <div id="33" class="valid-feedback">
                            <?php echo $message['changed3']; ?>
                        </div>
                        <div class="form-floating">
                        <div class="d-flex flex-column">
                            <button type="submit" name="settings-btn" href="" class="btn coolbtn btn-lg btn-danger mt-4">Spara inställningar</button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

  </body>
</html>
