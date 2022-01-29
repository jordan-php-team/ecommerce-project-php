<?php
include_once "../db.php";
session_start();
?>
<?php include "../functions.php"; ?>
<?php
getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from technext.github.io/aranoz/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>aranoz</title>
  <link rel="icon" href="img/favicon.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css" />
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css" />
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css" />
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
              <img src="img/logo.png" alt="logo" />
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
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Shop
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="category.php">
                      shop category</a>
                    <!-- <a class="dropdown-item" href="single-product.php">product details</a> -->
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                    <?php if ($_SESSION['user_logged_in']) : ?>
                      <a class="dropdown-item" href="login.php" id="login-field"> Logout</a>
                    <?php else : ?>
                      <a class="dropdown-item" href="login.php" id="login-field"> login</a>
                    <?php endif; ?>
                    <!-- <a class="dropdown-item" href="tracking.html">tracking</a> -->
                    <a class="dropdown-item" href="checkout.php">product checkout</a>
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
              <!-- <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a> -->
              <!-- <a href="#"><i class="ti-heart"></i></a> -->
              <div class="dropdown cart">
                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cart-plus"></i>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="search_input" id="search_input_box">
      <div class="container">
        <form class="d-flex justify-content-between search-inner">
          <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
          <button type="submit" class="btn"></button>
          <span class="ti-close" id="close_search" title="Close Search"></span>
        </form>
      </div>
    </div>
  </header>
  <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Register</h2>
              <p>Home <span>-</span> Register</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================login_part Area =================-->
  <section class="login_part padding_top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="login_part_text text-center">
            <div class="login_part_text_iner">
              <h2>New to our Shop?</h2>
              <p>
                There are advances being made in science and technology
                everyday, and a good example of this is the
              </p>
              <a href="login.php" class="btn_3">Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="login_part_form">
            <div class="login_part_form_iner">
              <h3>
                Welcome Back ! <br />
                Please Sign in now
              </h3>
              <form class="row contact_form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" id="username-field" name='username' placeholder="username" />
                </div>
                <div class="msg1"></div>
                <div class="col-md-12 form-group p_star">
                  <input type="email" class="form-control" id="email-field" name="email" placeholder="email" />
                </div>
                <div class="msg2"></div>
                <div class="col-md-12 form-group p_star">
                  <input type="password" class="form-control" id="password-field" name="password" placeholder="Password" />
                </div>
                <div class="msg3"></div>
                <div class="col-md-12 form-group p_star">
                  <input type="password" class="form-control" id="repeatPass-field" name="repeatPass" placeholder="Repeat Password" />
                </div>
                <div class="msg4"></div>
                <div class="col-md-12 form-group p_star">
                  <input type="date" class="form-control" id="password" max="2005-12-31" name="date" placeholder="Date " />
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account d-flex align-items-center">
                    <input type="checkbox" id="f-option" name="selector" />
                    <label for="f-option">Remember me</label>
                  </div>
                  <input type="submit" id="submit-btn" value='Submit' name='submit' class="btn_3">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================login_part end =================-->

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
  <script src="../validation.js"></script>
</body>

<!-- Mirrored from technext.github.io/aranoz/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->

</html>