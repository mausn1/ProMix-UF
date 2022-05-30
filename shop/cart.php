<?php include "$_SERVER[DOCUMENT_ROOT]/account/authController.php"; 
if (!$_SESSION['username']) {
    header("location: https://promix-uf.se/account/login");
} ?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link
      rel='stylesheet'
      href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'
    />
    <link rel='icon' type='image/x-icon' href='/uf.png' />
    <link rel='stylesheet' href='/style.css' />
    <title>Varukorg - ProMix</title> 
    <meta data-rh='true' name='description' content='ProMix är ett UF företag som 
    jobbar med att sälja högkvalitativ dryck samt ge kunder den bästa uppplevelse från oss. 
    Vi vill att ni ska ha de bra och njuta av vårt fantastiska te'>
    <meta data-rh='true' name='keywords' content='Uf företag, te, promix, gott te, frukt te, iste, rooibos te, allt te, bästa hemsida uf företag'>
    <meta data-rh='true' property='og:url' content='https://www.promix-uf.se/'>
  </head>
  <body class='text-center'>
  
  
  
    <nav
      class='navbar fixed-top navbar-dark bg-dark '
      aria-label='Main navigation'
    >
      <div class='container'>
        <a class='navbar-brand' id='#' href='https://www.promix-uf.se'>
          <img src='/uf.png' alt='' width='50' />
          <b>ProMix</b></a
        >
        <button
  class='navbar-toggler collapsed p-0 border-0'
  type='button'
  data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'
  aria-label='Toggle navigation'
  aria-expanded='false'
>
          <span class='navbar-toggler-icon'></span>        </button>

          <div class='offcanvas offcanvas-end bg-dark' tabindex='-1' id='offcanvasRight' aria-labelledby='offcanvasRightLabel' >
            <div class='offcanvas-header pb-0'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'>
                        </div>
                        <div class='col d-flex justify-content-center pl-0 mt-auto'>
                            <h5 id='offcanvasRightLabel' class='mb-0 text-light'><b>Meny</b></h5>
                        </div>
                        <div class='col d-flex justify-content-end mt-auto'>
                            <button type='button' class='btn-close btn-lg text-reset' data-bs-dismiss='offcanvas' aria-label='Close' style='filter:invert(100%);'></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class='offcanvas-body d-flex flex-column pt-0'>
              <hr class='text-light'>
              <ul class='nav navbar-nav nav-pills flex-column mb-auto'>
                  <li class='nav-item'>
                      <a href='https://promix-uf.se' class='nav-link text-center fs-5'>Hem</a>
                  </li>
                  <li class='nav-item'>
                    <a href='https://promix-uf.se/shop' class='nav-link text-center active fs-5'>Webbshopp</a>
                  </li>
                  <li class='nav-item'>
                    <a href='https://promix-uf.se/contact' class='nav-link text-center fs-5'>Kontakt</a>
                  </li>
              </ul>
              <hr class='text-light'>
              <div class='btn-group dropup mx-auto'>
                  <a id='dropdownUser' data-bs-toggle='dropdown' aria-expanded='false' href='' class='d-flex align-items-center text-light text-decoration-none dropdown-toggle'>
                        <img src='/monkey.jpg' width='40' alt='' class='me-2 rounded-circle'>
                        <strong><?php echo ($_SESSION['username']); ?></strong>
                  </a>
                  <ul class='dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow' aria-labelledby='dropdownUser' data-popper-placement='top-start'>
                    <li>
                        <a href='https://promix-uf.se/account/mypage/settings' class='dropdown-item'>
                            Inställningar
                        </a>
                    </li>
                    <li>
                        <a href='https://promix-uf.se/account/mypage/profile' class='dropdown-item'>
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href='https://promix-uf.se/account/mypage/dashboard' class='dropdown-item'>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <hr class='dropdown-divider' style='margin-top: 10px;margin-bottom: 10px;'>
                    </li>
                    <li>
                        <a href='?logout=1' class=' logout dropdown-item' >Logga ut</a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
      </div>
    </nav>
    <div class='p-5 bg-dark'></div>
        <div class='min-vh-100 bg-dark text-light'>
            <div class='container'>
                <h1><b>Varukorg</b></h1>
                <hr class='text-light mb-5'>
                <?php if ($resultu ->num_rows > 0){
                echo "<form action='cart' method='post'>
                  <table class='table table-dark table-bordered table-hover table-sm table-responsive'>
                    <thead>
                      <tr>
                        <th scope='col'></th>
                        <th scope='col'>Produktnamn</th>
                        <th scope='col'>Antal</th>
                        <th scope='col'>Pris</th>
                      </tr>
                    </thead>
                    <tbody>
                    ";
                }else{
                    echo "<p class='lead p-3 bg-danger rounded'><i class='bi bi-info-circle-fill'></i> Din varukorg är tom <p>";
                    echo "<a href='https://promix-uf.se/shop/' class='text-light text-decoration-none lead'><div class='btn btn-lg btn-danger coolbtn mt-3'><i class='bi bi-arrow-left'></i> Tillbaka till Webbshoppen</div></a>
                    ";
                }
                        while ($cart_row = $resultu->fetch_assoc()){
                            $i = 0;
                            foreach($resultu as $column) {
                            echo utf8_encode("<tr>
                            <th><a href=''><button class='btn' type='submit' name='remove_item$i'><i class='bi bi-x-circle-fill text-light yaya fs-4'></i></button></a></th>
                            <td class='table_align_center'>");
                            
                            if ($column['product_id'] == 1){
                                echo "Ekologiskt Frukt Te";
                            }elseif ($column['product_id'] == 2){
                                echo "Grönt Chai Te";
                            }else{
                                echo "Godis Te";
                            }
                            
                            echo utf8_encode("</td>
                            <td class='table_align_center'><input name='product$i' step='1' type='number' class='text-center resp_size form-control mx-auto'  style='width: 30%;' value='".$column['amount']."'></td>
                            <td class='table_align_center'>".$column['price']." kr</td><p class='text-light'>$yo</p>");
                          $i++;
                        }
                        }
                        
                if ($resultu ->num_rows > 0){ 
                    echo "</tbody>
                    <tfoot>
                      <th scope='row'>Totalt</th>
                      <td></td>
                      <td></td>
                      <td>".$totalcart." kr</td>
                    </tfoot>
                  </table>
                    <div class='p-1 d-flex justify-content-end '>
                      <button class='btn btn-lg btn-danger coolbtn mt-3 me-3' type='submit' name='save_cart'>Spara förändringar
                      </button>
                      <button type='submit' class='btn btn-lg btn-danger coolbtn mt-3' name='to_checkout'>Till kassan</div>
                    </button>
                </form>";
                    }


                ?>
                </div>     
            </div>

    <!-- Footer -->
    <footer class='p-5 bg-dark text-white text-center position-relative'>
      <div class='container'>
        <p class='lead'> <small>Copyright &copy 2021-2022 ProMix UF</small>  </p>        <a
          class='btn btn-link text-light btn-dark'
          href='https://www.instagram.com/promixuf/'
          role='button'
          target='_blank'
          
          ><i class='bi bi-instagram'></i
        ></a>
      </div>
    </footer>
    <!-- Bootstrap bundle -->
    <script
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
      integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p'
      crossorigin='anonymous'
    ></script>
  </body>
</html>