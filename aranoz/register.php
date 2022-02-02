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
  <title>kenbae</title>
  <link rel="icon" href="img/favicon2.png" />
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
  <?php include "originHeader.php"; ?>
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
                Sign Up Here
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
                  <input type="mobile" class="form-control" id="mobile-field" name="mobile" placeholder="07########" />
                </div>
                <div class="msg5"></div>
                <div class="col-md-12 form-group p_star">
                  <input type="date" class="form-control" id="password" max="2005-12-31" name="age" placeholder="Date " required />
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
  <script src="validation.js"></script>
</body>

<!-- Mirrored from technext.github.io/aranoz/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->

</html>