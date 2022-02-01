<?php

include_once "../db.php";


?>

<?php include_once "../functions.php"; ?>
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

    .hello:hover {
        background-color: #ECFDFF;
        border-radius: 10px;
    }
</style>

<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center ">
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
                            <?php if (!empty($_SESSION['loggedUser'])) : ?>




                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <!-- this alternative syntax is excellent for improving legibility (for both PHP and HTML!) in situations where you have a mix of them. -->
                                        <?php logout(); ?>
                                        <?php if (!empty($_SESSION['loggedUser'])) : ?>
                                            <form action="login.php" method="post">

                                                <?php echo  "<button type='submit' name='logout_btn' class='dropdown-item' id='login-field'> Logout</button>" ?>
                                            </form>
                                        <?php else : ?>
                                            <a class="dropdown-item" href="login.php" id="login-field"> login</a>
                                        <?php endif; ?>

                                        <!-- <a class="dropdown-item" href="tracking.html">tracking</a> -->
                                        <!-- <a class="dropdown-item" href="checkout.php">product checkout</a> -->
                                        <a class="dropdown-item" href="cart.php">shopping cart</a>
                                        <?php if (!empty($_SESSION['loggedUser'])) : ?>

                                            <a class="dropdown-item" href="confirmation.php">Profile</a>


                                        <?php endif; ?>
                                        <!-- <a class="dropdown-item" href="elements.html">elements</a> -->
                                    </div>
                                </li>
                            <?php endif; ?>
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
                                    echo "<strong style='color:#eb1a50 !important'>$count</strong>";
                                }
                                ?>
                            </a>

                        </div>
                    </div>
                    <div class="hearer_icon d-flex ml-5">

                        <?php if (empty($_SESSION['loggedUser'])) : ?>

                            <a class="dropdown-item" style="background-color:  #FF2547; color:white; padding:.5em 2em ; margin:auto; border-radius:10px; font-weight:600;" href="register.php">Signup</a>
                            <span class="hello" style="margin-left: .7em;">

                                <a class="dropdown-item" id="hello" style="background-color:  transparent; color:black; padding:.5em 2em ; margin:auto; border-radius:10px; font-weight:600;" href="login.php">Login</a>
                            </span>


                        <?php endif; ?>
                    </div>

                </nav>
            </div>
        </div>
    </div>

</header>