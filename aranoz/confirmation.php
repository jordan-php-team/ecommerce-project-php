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
  <link rel="icon" href="img/favicon1.png">
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
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
              <img style="width:7.5em" src="img/kanabelogo1.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="category.php" id="navbarDropdown_1">
                    Shop
                  </a>
                  <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="category.php">
                      shop category</a>
                    <a class="dropdown-item" href="single-product.php">product details</a>
                  </div> -->
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                    <!-- this alternative syntax is excellent for improving legibility (for both PHP and HTML!) in situations where you have a mix of them. -->
                    <?php logout(); ?>
                    <?php if ($_SESSION['loggedUser']) : ?>
                      <form action="login.php" method="post">

                        <?php echo  "<button type='submit' name='logout_btn' class='dropdown-item' id='login-field'> Logout</button>" ?>
                      </form>
                    <?php else : ?>
                      <a class="dropdown-item" href="login.php" id="login-field"> login</a>
                    <?php endif; ?>
                    <!-- <a class="dropdown-item" href="tracking.html">tracking</a> -->
                    <!-- <a class="dropdown-item" href="checkout.php">product checkout</a> -->
                    <a class="dropdown-item" href="cart.php">shopping cart</a>
                    <a class="dropdown-item" href="confirmation.php">confirmation</a>
                    <!-- <a class="dropdown-item" href="elements.html">elements</a> -->
                  </div>
                </li>
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    blog
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                    <a class="dropdown-item" href="blog.html"> blog</a>
                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                  </div>
                </li> -->

                <!-- <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li> -->
              </ul>
            </div>
            <div class="hearer_icon d-flex">

              <div class="dropdown cart">
                <a class="dropdown-toggle" href="cart.php" id="navbarDropdown3">
                  <i class="fas fa-cart-plus" style="font-size: 1.7em;"></i>
                  <?php
                  if (isset($_SESSION['products'])) {
                    $count = count($_SESSION['products']);
                    echo "<strong>$count</strong>";
                  }
                  ?>
                </a>

              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

  </header>
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
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
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
                    print_r(ucfirst($_SESSION['loggedUser']['password']));
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

        <!-- <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
                <p>Street</p><span>: 56/8</span>
              </li>
              <li>
                <p>city</p><span>: Los Angeles</span>
              </li>
              <li>
                <p>country</p><span>: United States</span>
              </li>
              <li>
                <p>postcode</p><span>: 36952</span>
              </li>
            </ul>
          </div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>

            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>

              <?php orderDetails(); ?>

            </table>

          </div>
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