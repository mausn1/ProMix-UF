<?php include 'authController.php';
if (!isset($_SESSION['email'])){
    header('location: https://promix-uf.se');
}
if (isset($_SESSION['username'])){
    header('location: https://promix-uf.se');
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
    <title>Återställ lösenord - ProMix</title>
  </head>
  <body class="text-center bg-dark">
    <!-- Reset form -->
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
              <form method="post" action="resetpassword" class="form-inline justify-content-center align-middle">
                <img
                  src="/uf.png"
                  alt=""
                  class="img-fluid mb-1"
                  style="width: 200px;"
                />
                <h1 class="h1 fw-normal text-light mb-5">Återställ lösenord</h1>
                <div class="form-floating text-align-center mt-3">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control <?php if($errors['password'] or $errors['passwordsame']): ?><?php echo 'is-invalid'; ?><?php endif; ?>"
                    placeholder="Password"
                  />
                  <label class="text-dark" for="password">Lösenord</label>
                    <div id="1" class="invalid-feedback">
                    <?php echo $errors['password'] ?>
                  </div>
                </div>
                <div class="form-floating text-align-center mt-3">
                  <input
                    type="password"
                    name="passwordConf"
                    id="password"
                    class="form-control <?php if($errors['password'] or $errors['passwordsame']): ?><?php echo 'is-invalid'; ?><?php endif; ?>"
                    placeholder="Password"
                  />
                  <label class="text-dark" for="password">Bekräfta lösenord</label>
                  <div id="2" class="invalid-feedback">
                    <?php echo $errors['passwordsame'] ?>
                  </div>
                </div>
                  <button type="submit" name="reset-password-btn" href="" class="btn coolbtn btn-lg btn-danger w-100 mt-4">Ändra lösenordet</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap bundle -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
