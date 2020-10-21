<?php

?>
<style>
    .ajax-message {
        position: fixed;
        right: 100px;
        top: 120px;
        z-index: 10000000;
        border: 1px solid #21431ecc;
        color: white;
        padding: 4px 12px;
        border-radius: 4px;
        background: #B0B435;
        transition: all 0.3s ease 0s;
        opacity: 0;
    }

    .ajax-message-active {
        opacity: 1;
    }

</style>
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="right-phone-box">
                    <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        <?php if (isset($_SESSION['user'])):
                            $url_user_id = "index.php?controller=user&action=index2&id=" . $_SESSION['user']['id'];
                        ?>
                            <li><a href="<?php echo $url_user_id?>"><i class="fa fa-user s_color"></i> My Account</a></li>
                        <?php else:?>
                        <li><a href="index.php?controller=user&action=login"><i class="fa fa-user s_color"></i> My Account</a></li>
                        <?php endif;?>
                        <li><a href="index.php?controller=home&action=location"><i class="fas fa-location-arrow"></i> Our location</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <?php if(empty($_SESSION['user'])):?>
                <div class="login-box">
                    <a style="color: white" href="index.php?controller=user&action=login" class="btn hvr-hover">Đăng nhập</a>
                    <a style="color: white" href="index.php?controller=user&action=register" class="btn hvr-hover">Đăng Ký</a>
                </div>
                <?php else:?>
                <div class="login-box ">
                    <li class="dropdown">
                        <a href="" class="row" data-toggle="dropdown">
                            <img style="border: 1px solid white; border-radius: 50%" height="30" width="30" src="assets/uploads/<?php echo isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'user.png'?>" alt="">
                            <div style="color: whitesmoke; margin-left: 10px"><?php echo $_SESSION['user']['username']?></div>
                        </a>
                        <ul class="dropdown-menu">
                            <?php $url_order = "index.php?controller=user&action=order&id=" . $_SESSION['user']['id']?>
                            <li><a href="<?php echo $url_order?>">Đơn hàng</a></li>
                            <li><a href="index.php?controller=user&action=logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                </div>
                <?php endif;?>
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Welcome to Reptile Shop
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> ...
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"><img height="100" src="assets/images/logo_shop1.png" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link"  href="#">About Us</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a href="index.php?controller=home&action=products&id=3">Tortoises</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?controller=home&action=detail&id=10">Sultaca Tortoise</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=12">Leopard Tortoise</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=11">Indian Star Tortoise</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="index.php?controller=home&action=products&id=8">Bearded Dragon</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?controller=home&action=detail&id=28">Red Bearded Dragon</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=29">Orange Bearded Dragon</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=30">Yellow Bearded Dragon</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=31">White Bearded Dragon</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="index.php?controller=home&action=products&id=2">Pythons</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?controller=home&action=detail&id=5">Ball Python</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=8">White Lipped Python</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=9">Green Tree Python</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=6">Red Tail Boa</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="index.php?controller=home&action=products&id=1">Snakes</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?controller=home&action=detail&id=3">Corn Snake</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=1">Hognose Snake</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=2">King Snake</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=4">Milk Snake</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="index.php?controller=home&action=products&id=4">Monitors</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?controller=home&action=detail&id=14">B&W Tengu</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=13">Savannah Monitor</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=16">Nile Monitor</a></li>
                                    <li><a href="index.php?controller=home&action=detail&id=15">Black Throat Monitor</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?controller=home&action=products&id=6">Cages</a></li>
                            <li><a href="index.php?controller=home&action=products&id=5">Feeders</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=home&action=contact">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="gio-hang-cua-ban.html" class="cart-link">
                            <i class="fa fa-shopping-bag"></i>
                            <?php
                            $cart_total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] AS $cart) {
                                    $cart_total += $cart['quantity'];
                                }
                            }
                            ?>
                            <span class="cart-amount">
                                <?php echo $cart_total; ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <?php if (isset($_SESSION['cart'])):?>
                        <?php $total_cart = 0; foreach ($_SESSION['cart'] as $product_id => $cart): ?>
                            <li>
                                <a href="#" class="photo"><img src="../backend/assets/uploads/<?php echo $cart['avatar'] ?>" class="cart-thumb" alt="" /></a>
                                <h6><a href="#"><?php echo $cart['name']?> </a></h6>
                                <p><?php echo $cart['quantity'];?>x - <span class="price"><?php echo number_format($cart['price'])?> đ</span></p>
                            </li>
                            <?php
                            $total_item = $cart['price'] * $cart['quantity'];
                            $total_cart += $total_item;
                            ?>
                        <?php endforeach;?>
                    <li class="total">
                        <a href="index.php?controller=cart&action=index" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>: <?php echo number_format($total_cart);?> đ</span>
                    </li>
                    <?php else:?>
                    <li>
                        Giỏ hàng trống
                    </li>
                    <?php endif;?>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <span class="ajax-message"></span>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <form action="" method="get">
                <span class="input-group-addon"><button type="submit" name="home-search" class="home-search"><i class="fa fa-search"></i></button></span>
                <input type="text" class=" searchbtn" name="text" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </form>
        </div>
    </div>
</div>
<!-- Messaeg Wrapper. Contains messaege error and success -->
<div class="message-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        <!--        <div class="alert alert-danger">Lỗi validate</div>-->
        <!--        <p class="alert alert-success">Thành công</p>-->
    </section>
</div>