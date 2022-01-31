<?php
session_start();
include_once "../db.php";


?>

<?php include "../functions.php"; ?>


<?php
global $pdo;
$quanitity = 1;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['addToCart'])) {
    $product_id = $_GET['addToCart'];

    $data = "SELECT * FROM products WHERE id=$product_id";
    $sql = $pdo->prepare($data);
    $sql->execute();
    $result = $sql->fetch();
    //  var_dump($result);
    $flag = false;
    if ($result['stock'] > 0) {

      if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $element) {
          if ($element['id'] == $product_id) {
            $_SESSION['products'][$product_id][0] += 1;
            $flag = true;
            break;
          }
        }

        if ($flag == false) {
          $_SESSION['products'][$product_id] = $result;
          $_SESSION['products'][$product_id][0] = $quanitity;
        }


        foreach ($_SESSION['products'] as $element) {

          $_SESSION['products'][$product_id]['Total'] = $element[0] * intval($element['product_price']);

          if ($_SESSION['products'][$product_id]['product_discount'] > 0) {

            $discount_percentage_product = $_SESSION['products'][$product_id]['Total'] * ($element['product_discount'] / 100);
            $Total_product_after_dicount = $_SESSION['products'][$product_id]['Total'] - $discount_percentage_product;
            $_SESSION['products'][$product_id]['Total_after_discount'] = $Total_product_after_dicount;


            $discount_percentage_product = ($element['product_discount'] / 100) * intval($element['product_price']);
            $price_product_after_dicount = intval($element['product_price']) - $discount_percentage_product;
            $_SESSION['products'][$product_id]['product_price_after_discount'] = $price_product_after_dicount;
          } else {
            $_SESSION['products'][$product_id]['Total'] = $element[0] * intval($element['product_price']);
            $_SESSION['products'][$product_id]['Total_after_discount'] = $_SESSION['products'][$product_id]['Total'];
            $_SESSION['products'][$product_id]['product_price_after_discount'] = $_SESSION['products'][$product_id]['product_price'];
          }
        }
        // header("location: category.php");
        // echo '<script type="text/javascript">alert("add to cart")</script>';
      }
    } else {
      echo '<script type="text/javascript">alert("is empty stock")</script>';
      // header("location: category.php");

    }
  }
}

?>


<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from technext.github.io/aranoz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>kenbae</title>
  <link rel="icon" href="img/favicon1.png" />
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

  header{
    position: fixed !important;
    background:white;
  }
</style>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu" >
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

  <!-- banner part start-->
  <section class="banner_part">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="banner_slider owl-carousel">
            <?php
            $sql = "SELECT * FROM products WHERE id IN (25,26,27)";
            $select_all_products = $pdo->query($sql);
            $select_all_products->execute();
            while ($row = $select_all_products->fetchAll()) {
              $products = $row;
              foreach ((array) $products as $product) {
            ?>



                <div class="single_banner_slider">
                  <div class="row">
                    <div class="col-lg-5 col-md-8">
                      <div class="banner_text">
                        <div class="banner_text_iner">
                          <?php
                          echo "<h1 >" . $product['product_name'] . "</h1>";
                          echo  "<p>" . $product['product_description'] . "</p>";

                          ?>

                          <a href="category.php" class="btn_2">buy now</a>
                        </div>
                      </div>
                    </div>
                    <div class="banner_img d-none d-lg-block">
                      <img src="img/feature/<?php echo  $product['product_image']; ?>" alt="" />


                    </div>
                  </div>
                </div>
            <?php
              }
            };
            ?>

          </div>
          <div class="slider-counter"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner part start-->

  <!-- feature_part start-->
  <section class="feature_part padding_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section_tittle text-center">
            <h2>Featured Category</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between">
        <?php
        $sql = "SELECT * FROM products WHERE id = 19";
        $select_all_products = $pdo->query($sql);
        $select_all_products->execute();
        while ($row = $select_all_products->fetchAll()) {
          $products = $row;
          foreach ((array) $products as $product) {
        ?>


            <div class="col-lg-7 col-sm-6">
              <div class="single_feature_post_text">

                <p>Premium Quality</p>
                <h3>Latest foam Sofa</h3>
                <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                <img src="img/feature/<?php echo  $product['product_image']; ?>" alt="" />
            <?php
          }
        };
            ?>


              </div>
            </div>

            <?php
            $sql = "SELECT * FROM products WHERE id = 20";
            $select_all_products = $pdo->query($sql);
            $select_all_products->execute();
            while ($row = $select_all_products->fetchAll()) {
              $products = $row;
              foreach ((array) $products as $product) {
            ?>

                <div class="col-lg-5 col-sm-6">
                  <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest foam Sofa</h3>
                    <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="img/feature/<?php echo  $product['product_image']; ?>" alt="" />
                <?php
              }
            };
                ?>
                  </div>
                </div>
                <?php
                $sql = "SELECT * FROM products WHERE id = 21";
                $select_all_products = $pdo->query($sql);
                $select_all_products->execute();
                while ($row = $select_all_products->fetchAll()) {
                  $products = $row;
                  foreach ((array) $products as $product) {
                ?>

                    <div class="col-lg-5 col-sm-6">
                      <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/<?php echo  $product['product_image']; ?>" alt="" />
                    <?php
                  }
                };
                    ?>
                      </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM products WHERE id = 25";
                    $select_all_products = $pdo->query($sql);
                    $select_all_products->execute();
                    while ($row = $select_all_products->fetchAll()) {
                      $products = $row;
                      foreach ((array) $products as $product) {
                    ?>
                        <div class="col-lg-7 col-sm-6">
                          <div class="single_feature_post_text">
                            <p>Premium Quality</p>
                            <h3>Latest foam Sofa</h3>
                            <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                            <img src="img/feature/<?php echo  $product['product_image']; ?>" alt="" />
                        <?php
                      }
                    };
                        ?>
                          </div>
                        </div>
      </div>


    </div>
  </section>
  <!-- upcoming_event part start-->

  <!-- product_list start-->
  <section class="product_list section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Discount <span>shop</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="product_list_slider owl-carousel">
            <div class="single_product_list_slider">
              <div class="row align-items-center justify-content-between">
                <?php
                $sql = "SELECT * FROM products WHERE id IN (1,2,3,4)";
                $select_all_products = $pdo->query($sql);
                $select_all_products->execute();
                while ($row = $select_all_products->fetchAll()) {
                  $products = $row;
                  foreach ((array) $products as $product) {
                ?>
                    <?php
                    if ($product['product_discount'] > 0) {
                      $Total_product_before_dicount = $product['product_price'];
                      $discount_percentage_product = 0;
                      $discount_percentage_product = $Total_product_before_dicount * ($product['product_discount'] / 100);
                      $Total_product_after_dicount = $Total_product_before_dicount - $discount_percentage_product;
                    } else {
                      $Total_product_after_dicount = ' ';
                    }

                    ?>
                    <div class="col-lg-3 col-sm-6">
                      <div class="single_product_item">


                        <img src="img/products/<?php echo  $product['product_image']; ?>" alt="" />
                        <div class="single_product_text">
                          <?php
                          echo "<h4>" . $product['product_name'] . "</h4>";
                          if ($product['product_discount'] > 0) {
                            echo     "<h3><del>$product[product_price]JD</del></h3>";
                          } else {
                            echo     "<h3>$product[product_price]JD</h3>";
                          }
                          echo    "<h3>$Total_product_after_dicount</h3>";
                          echo "<form method='GET'>";
                          echo "<button type='submit' value=$product[id] name='addToCart'   class='btn_3'>add to cart</button>";
                          echo "</form>"; ?>
                        </div>
                      </div>
                    </div>

                <?php
                  }
                };
                ?>






              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- product_list part start-->

  <!-- awesome_shop start-->

  <section class="our_offer section_padding">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <?php
        $sql = "SELECT product_image FROM products WHERE product_discount ='60%'";
        $select_all_products = $pdo->query($sql);
        $select_all_products->execute();
        while ($row = $select_all_products->fetchAll()) {
          $products = $row;
          foreach ((array) $products as $product) {
        ?>
            <div class="col-lg-6 col-md-6">
              <div class="offer_img">
                <img src="img/<?php echo  $product['product_image']; ?>" alt="" />

            <?php
          }
        };
            ?>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="offer_text">
                <h2>Weekly Sale on 60% Off All Products</h2>
                <div class="date_countdown">
                  <div id="timer">
                    <div class="date"></div>
                    <div id="hours" class="date"></div>
                    <div id="minutes" class="date"></div>
                    <div id="seconds" class="date"></div>
                  </div>
                </div>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2" />
                  <div class="input-group-append">
                    <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
  <!-- awesome_shop part start-->

  <!-- product_list part start-->
  <section class="product_list best_seller section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Best Sellers <span>shop</span></h2>
          </div>
        </div>
      </div>

      <div class="row align-items-center justify-content-between">
        <div class="col-lg-12">


          <div class="best_product_slider owl-carousel">



            <?php
            $sql = "SELECT * FROM products WHERE id IN (7,8,10,11,12)";
            $select_all_products = $pdo->query($sql);
            $select_all_products->execute();
            while ($row = $select_all_products->fetchAll()) {
              $products = $row;
              foreach ((array) $products as $product) {
            ?>
                <div class="single_product_item">
                  <img src="img/products/<?php echo  $product['product_image']; ?>" alt="" />

                  <div class="single_product_text">
                    <?php
                    echo "<h4>" . $product['product_name'] . "</h4>";
                    echo "<h3>" . $product['product_price'] . "JD</h3>";
                    ?>
                  </div>
                </div>


            <?php
              }
            };
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- product_list part end-->

  <!-- subscribe_area part start-->
  <section class="subscribe_area section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="subscribe_area_text text-center">
            <h5>Join Our Newsletter</h5>
            <h2>Subscribe to get Updated with new offers</h2>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--::subscribe_area part end::-->



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
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="../validation.js"></script>
</body>

<!-- Mirrored from technext.github.io/aranoz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:34 GMT -->

</html>