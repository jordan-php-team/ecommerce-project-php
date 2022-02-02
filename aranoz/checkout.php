<?php
include_once "../db.php";
include "../functions.php";
session_start();
// session_unset();
if (isset($_SESSION["products"])) {
  $cart = $_SESSION["products"];
}

if (isset($_SESSION['loggedUser'])) {
  $loggedSession = $_SESSION['loggedUser'];
}

// echo "<pre>";
// // var_dump($cart);
// var_dump($_SESSION['loggedUser']);
// print_r($_SESSION['loggedUser']['username']);
// echo "</pre>";

?>
<?php
// echo "<pre>";
// var_dump($_SESSION['products']);
?>

<?php
global $Total;




?>

<!doctype html>
<html lang="zxx">


<!-- Mirrored from technext.github.io/aranoz/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>kenbae</title>
  <link rel="icon" href="img/favicon2.png" />
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
</head>
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
              <h2>Order Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">

      <?php

      ?>
    </div>
    <div class="billing_details">
      <?php
      $usernameDetail = $_SESSION['loggedUser']['username'];
      $emailDetail = $_SESSION['loggedUser']['email'];
      $mobileDetail = $_SESSION['loggedUser']['mobile'];


      ?>

      <div class="row mx-5  ">
        <div class="col-lg-8 ">
          <h3>Billing Details</h3>
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="first" name="name" value="<?php echo $usernameDetail; ?>" disabled />
              <!-- <span class="placeholder" data-placeholder="First name"></span> -->
            </div>
            <!-- <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="last" name="name" />
              <span class="placeholder" data-placeholder="Last name"></span>
            </div> -->

            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="number" name="deliveryNumber" value="<?php echo $mobileDetail; ?>" />
              <!-- <span class="placeholder" data-placeholder=" span> -->
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="email" name="compemailany" value="<?php echo $emailDetail; ?>" disabled />
              <!-- <span class="placeholder" data-placeholder="Email Address"></span> -->
            </div>

            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="add1" name="city" placeholder="city" required />
              <!-- <span class="placeholder" data-placeholder="City"></span> -->
            </div>
            <!-- <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add2" name="add2" />
              <span class="placeholder" data-placeholder="Address line 02"></span>
            </div> -->

            <div class="col-md-12 form-group">

              <textarea class="form-control" name="message" id="message" rows="1" placeholder="please fill your full address" required></textarea>
            </div>


        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
              <li>
                <a href="#">Product
                  <span> <strong> after_discount</strong></span>
                  <!-- <span> Total</span> -->


                </a>
              </li>
              <?php
              foreach ($cart  as $element) { ?>


                <li>
                  <a><?php echo $element['product_name']; ?>
                    <span class="middle">x <?php echo $element[0]; ?></span>
                    <span class="last">
                      <?php
                      $Total += $element['Total_after_discount'];
                      echo $element['Total_after_discount'];


                      ?> JD</span>
                    <!-- <span class="last"> -->
                    <?php
                    // echo $element['Total_after_discount'];
                    // 

                    ?> JD</span>
                    <!-- <span class="last"> -->
                    <?php
                    // echo $element[0] * $element['product_price']; 
                    // 
                    ?>

                  <?php } ?>
                  </a>
                </li>
                <?php
                // if ($_SERVER["REQUEST_METHOD"] == "GET") {
                //   if(isset($_GET['coupon']) && $_GET['coupon']=='furniture'){
                //   $coupon=$_GET['coupon'];
                //     $discount_percentage=$Total*0.2;
                //     global $TotalAftercoupon;
                //       $TotalAftercoupon =$Total-$discount_percentage;
                //   }
                // }


                ?>

            </ul>
            <ul class="list list_2">

              <li>
                <a href="#">Total
                  <span>

                    <?php
                    //  foreach ($cart  as $element){
                    if (isset($Total)) {
                      echo $Total;
                    }


                    ?> JD</span>
                </a>
              </li>

              <!-- <li> -->
              <!-- <a href="#">TotalAftercoupon -->
              <!-- <span> -->
              <?php
              //  if(isset($TotalAftercoupon) ){
              //    $element['all_Total']=$TotalAftercoupon;
              //   echo $TotalAftercoupon ;
              //  }

              //    }   
              ?>
              <!-- JD</span> -->
              <!-- </a> -->
              <!-- </li> -->


            </ul>
            <div class="payment_item">
              <div class="radion_btn">
                <label for="f-option5">
                  <input type="checkbox" name="selector" required style="margin-right: .3rem;" />Pay on delivery
                  <!-- <div class="check" Required></div>  -->

                </label>
              </div>

            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              checkoutButton($Total);
            }

            ?>

            <input type="submit" class="btn_3" name="checkout_submit" value="Checkout">
            </form>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

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


<!-- Mirrored from technext.github.io/aranoz/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->

</html>