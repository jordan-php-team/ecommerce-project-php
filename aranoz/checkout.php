<?php
include_once "../db.php";
include "../functions.php";
session_start();
// session_unset();
if(isset($_SESSION["products"])){
  $cart = $_SESSION["products"];
}

if(isset( $_SESSION['loggedUser'])){
  $loggedSession = $_SESSION['loggedUser'];
}



// echo "<pre>";
// var_dump($cart);
// var_dump($loggedSession);
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
  <link rel="icon" href="img/favicon1.png" />
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
</style>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
            <img style="width:7.5em" src="img/kanabelogo.png" alt="logo" />
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
              
                    <a class="dropdown-item" href="cart.php">shopping cart</a>
                    <a class="dropdown-item" href="confirmation.php">confirmation</a>
               
                  </div>
                </li>
               
              </ul>
            </div>
            <div class="hearer_icon d-flex">

              <div class="dropdown cart">
                <a class="dropdown-toggle" href="cart.php" id="navbarDropdown3">
                  <i class="fas fa-cart-plus" style="font-size: 1.7em;"></i>
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
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="name" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="name" />
                <span class="placeholder" data-placeholder="Last name"></span>
              </div>
          
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="compemailany" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
          
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="add1" />
                <span class="placeholder" data-placeholder="Address line 01"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add2" name="add2" />
                <span class="placeholder" data-placeholder="Address line 02"></span>
              </div>
        
              <div class="col-md-12 form-group">
            
                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
              </div>
            </form>
         
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
                foreach ($cart  as $element){?>

               
                  <li>
                    <a><?php echo $element['product_name']; ?>
                      <span class="middle">x <?php echo $element[0]; ?></span>
                      <span class="last">
                        <?php
                      $Total+= $element['Total_after_discount'];
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
          
                       <?php }?>
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
                    if(isset($Total)){
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
                 
                    //    }   ?> 
                    <!-- JD</span> -->
                  <!-- </a> -->
                <!-- </li> -->


              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Pay on delivery </label>
                  <div class="check" Required></div>
                </div>

              </div>
              
              <?php 
                  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    checkoutButton($Total);
                  }

          ?>
              <form method="post">
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