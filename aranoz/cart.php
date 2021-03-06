<?php
ob_start();
session_start();
// session_unset();

$cart = $_SESSION["products"];
// echo "<pre>";
// var_dump($cart);

?>

<?php include "../functions.php"; ?>

<!doctype html>
<html lang="zxx">


<!-- Mirrored from technext.github.io/aranoz/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->
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
  .empty-cart{
    display:flex;
    margin:0 auto;

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
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
 

  
  <?php if(!empty($_SESSION['products'])){?>
 
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price </th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <!-- <th scope="col">Delete</th> -->

              </tr>
            </thead>
            <tbody>

              <?php

              if (isset($cart)) {
                foreach ($cart as $element) { ?>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img src="img/products/<?php echo $element['product_image']; ?> " alt="" width=200px height=170px />
                        </div>
                        <div class="media-body">
                          <p><?php
                              // echo $element['product_price_after_discount'];
                              ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5><?php
                          echo $element['product_price_after_discount']; ?>JD</h5>
                    </td>
                    <td>
                      <div class="product_count">
                        <!-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> -->
                        <!-- <input class="input-number" type="text" value="1" min="1" max="10"> -->
                        <a style='color:#eb1a50 !important;font-size:1.75em' href='quanitity.php?id=<?php echo $element['id']; ?>&&name=Dencrement'>-</a>
                        <p style='font-weight:300'> <?php echo $element[0]; ?></p>
                        <a style='color:#eb1a50 !important;font-size:1.75em ' href='quanitity.php?id=<?php echo $element['id']; ?>&&name=Increment'>+</a>
                        <!-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> -->


                      </div>
                    </td>
                    <td>
                      <h5><?php
                          echo $element['Total_after_discount']; ?> JD</h5>
                    </td>
                    <td>
                      <a style='color:#eb1a50 !important ; font-size:1.25em' href='quanitity.php?id=<?php echo $element['id']; ?>&&name=delete'>Delete</a>
                    </td>
                  </tr>
                  <?php
                  // echo $element['Total_after_discount'];

                  global $Total;
                  $Total = $Total + $element['Total_after_discount'];

                  ?>
              <?php }
              } ?>

              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <?php if (!empty($Total)) { ?>
                    <h5><?php echo $Total; ?> JD</h5>
                </td>
              <?php } ?>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <!-- <a class="btn_1" href="#">Continue Shopping</a> -->

            <?php if (isset($_POST['to_checkout'])) {
              if ($_SESSION['loggedUser']) {

                header("location: checkout.php");
              } else {

                header("location: login.php");
              }
            }

            if (count($cart) > 0) { ?>
              <form method="post">
                <button class="btn_3" name="to_checkout">Proceed to checkout</button>
              </form>
            <?php  }; ?>




          </div>
        </div>
      </div>
  </section><?php }?>

 
  
  <?php if(empty($_SESSION['products'])){?>
    <img src="img/empty-cart.png" alt="empty-cart" class="empty-cart"/><?php }?>

  
  <!--================End Cart Area =================-->

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


<!-- Mirrored from technext.github.io/aranoz/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:51 GMT -->

</html>