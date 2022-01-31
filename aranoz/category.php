<?php
include_once "../db.php";
session_start();
//session_unset();
// unset($_SESSION['products']);
// echo "<pre>";
// var_dump($_SESSION['products']);
?>
<?php include "../functions.php"; ?>
<?php
$ghassan = $_SESSION['products'] ? $ghassan = $_SESSION['products'] : $ghassan = [];
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

            //   if(isset($_SESSION['products'])){
            // if ($ghassan) {

                foreach ($ghassan as $element) {
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
            // }


            // echo '<script type="text/javascript">alert("add to cart")</script>';
            //   echo    "<script>Swal.fire('add to cart')</script>";


            //    }

        } else {
            echo '<script type="text/javascript">alert("is empty stock")</script>';
        }
    }
}



?>




<!doctype html>
<html lang="zxx">


<!-- Mirrored from technext.github.io/aranoz/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:48 GMT -->
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


    header{
    position: fixed !important;
    background:white;
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
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <?php

                                    $categories = $pdo->prepare("SELECT * from categories");
                                    $categories->execute();

                                    foreach ($categories as $element) {

                                        echo   "<li>";
                                        echo  "<a href='category.php?id=$element[id]'>$element[category_title]</a>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </aside>






                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">

                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <?php
                                        $data = "SELECT * FROM products
                                        WHERE products LIKE '%or%'"; ?>
                                        <input type="text" class="form-control" placeholder="search" aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">









                        <?php


                        if (isset($_GET['id'])) {

                            $data = $pdo->prepare("SELECT * from products WHERE category_id=$_GET[id]");
                        } else {
                            $data = $pdo->prepare("SELECT * FROM products WHERE id<= 18 OR  id > 28");
                        }

                        if (isset($_GET['id']) && $_GET['id'] == 4) {
                            $data = $pdo->prepare("SELECT * from products  WHERE id <= 18 OR  id > 28 ");
                        }



                        if (isset($_GET['id']) && $_GET['id'] == 1) {
                            $data = $pdo->prepare("SELECT * from products  WHERE ( id <= 18 OR  id > 28) AND (category_id=$_GET[id]) ");
                        }


                        // var_dump($data);
                        $data->execute();

                        foreach ($data as $element) {
                            if ($element['product_discount'] > 0) {
                                $Total_product_before_dicount = $element['product_price'];
                                $discount_percentage_product = 0;
                                $discount_percentage_product = $Total_product_before_dicount * ($element['product_discount'] / 100);
                                $Total_product_after_dicount = $Total_product_before_dicount - $discount_percentage_product;
                            } else {
                                $Total_product_after_dicount = ' ';
                            }


                            echo  "<div class='col-lg-4 col-sm-6'>";
                            echo   "<div class='single_product_item'>";
                            echo    "<a href='single-product.php?id=$element[id]'><img src='$element[product_image]' alt='' width=500px height=170px>";
                            echo  "<div class='single_product_text'>";
                            echo      "<h4>$element[product_name]</h4>";
                            if ($element['product_discount'] > 0) {
                                echo     "<h3><del>$element[product_price]JD</del></h3>";
                            } else {
                                echo     "<h3>$element[product_price]JD</h3>";
                            }

                            echo    "<h3>$Total_product_after_dicount</h3>";
                            echo "<form method='GET'>";
                            echo     "<button type='submit' value=$element[id] name='addToCart'   class='btn_3'>add to cart</button>";
                            echo "</form>";
                            echo   "</div>";
                            echo   "</div>";
                            echo   "</div></a>";
                        }

                        ?>

                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->



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
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>


<!-- Mirrored from technext.github.io/aranoz/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 11:48:49 GMT -->

</html>