<?php
session_start();

include_once "../db.php";
?>
<?php include "../functions.php"; ?>

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
  
  .btn-edit{
   
    margin: .5em 25em;
    padding: 1em;
    background-color: #ff3368;
    color: #fff;
    border-radius: 5px;
    line-height: 10px;
    border: 2px solid #ff3368;
}
.btn-edit a {
  color:white;
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


    header {
      position: fixed !important;
      background: white;
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

  <!--================ confirmation part start =================-->
  <section class="confirmation_part padding_top">
  <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
          </div>
        </div>
  <div class="row">
            <?php orderDetails(); ?>
      </div>
    <div class="container">
      <div class="row">
      <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span></span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <?php orders(); ?>

          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <form method="post">
              <h4>User Info</h4>
              <ul>
                <li>
                  <p>Name:</p>
                  <?php if ($_SESSION['loggedUser'] != "") {
                    print_r(ucfirst($_SESSION['loggedUser']['username']));
                  } else {
                    echo "There";
                  } ?>
                </li>
                </br>
                <li>
                  <p>Mobile:</p>
                  <?php if ($_SESSION['loggedUser'] != "") {
                    print_r(ucfirst($_SESSION['loggedUser']['mobile']));
                  } else {
                    echo "There";
                  } ?>
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
                  <?php if ($_SESSION['loggedUser'] != "") {
                    echo "**********";
                  } else {
                    echo "There";
                  } ?>
                </li>
              </ul>

              <button class="btn-edit" type="submit" name="edit"><a href="editform.php">Edit</a></button>
            </form>
          </div>
          </br>
        </div>


      </div>
  
                </div>  
  </section>
  <!--================ confirmation part end =================-->

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

  <!-- jquery plugins here-->
  <!-- jquery -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/price_rangs.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>


<!-- Mirrored from technext.github.io/aranoz/confirmation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->

</html>

</html>

</html>

</html>

</html>

</html>