<?php
session_start();
include_once "../db.php";
?>
<?php include "../functions.php"; ?>
<?php
editInfo();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/aranoz/confirmation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>kenbae</title>
  <link rel="icon" href="img/favicon2.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- nice select CSS -->
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    .btn-edit {

      margin: .5em 23em;
      padding: 1em;
      background-color: #ff3368;
      color: #fff;
      border-radius: 5px;
      line-height: 10px;
      border: 2px solid #ff3368;
    }

    .btn-edit a {
      color: white;
    }

    .container {
      margin: 0 auto;
    }
  </style>

  <style>
    .main_menu .cart i:after {
      position: absolute;
      border-radius: 50%;
      background-color: transparent !important;
      width: 14px;
      height: 14px;
      right: -8px;
      top: -8px;
      content: "" !important;
      text-align: center;
      line-height: 15px;
      font-size: 10px;
      color: #fff;
    }


    .cart .fa-cart-plus:hover {
      transform: scale(1.1);
      transition: .2s;
    }
  </style>

<body>
  <!--::header part start::-->
  <?php include "originHeader.php"; ?>
  <!-- Header part end-->

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Order Confirmation</h2>
              <p>Home <span>-</span> Order Confirmation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <section class="confirmation_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <form method="post">
              <h4>User Info</h4>
              <ul>
                <li>
                  <p>Name:</p>
                  <input name="name" value="<?php if ($_SESSION['loggedUser'] != "") {
                                              print_r(ucfirst($_SESSION['loggedUser']['username']));
                                            } else {
                                              echo "There";
                                            } ?>"></input>
                </li>
                </br>
                <li>
                  <p>Mobile:</p>
                  <input name="mobile" value="<?php if ($_SESSION['loggedUser'] != "") {
                                                print_r(ucfirst($_SESSION['loggedUser']['mobile']));
                                              } else {
                                                echo "There";
                                              } ?>"></input>
                </li>
                </br>
                <li>
                  <p>Email:</p>
                  <?php if ($_SESSION['loggedUser'] != "") {
                    print_r(ucfirst($_SESSION['loggedUser']['email']));
                  } else {
                    echo "There";
                  } ?>
                </li>
                </br>
                <li>
                  <p>Password:</p>
                  <input name="password" placeholder="*******" />
                </li>
              </ul>

              <input class="btn-edit" value="submit" type="submit" name="edit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--::footer_part start::-->
  <footer class="footer_part">
    <div class="container">

    </div>
    <div class="copyright_part">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="copyright_text">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer_icon social_icon">
              <ul class="list-unstyled">
                <li>
                  <a href="https://www.facebook.com/" class="single_social_icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a href="https://twitter.com/" class="single_social_icon" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--::footer_part end::-->

</body>

</html>