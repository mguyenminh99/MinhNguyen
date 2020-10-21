<?php
//views/homes/index.php
require_once 'helpers/Helper.php';
?>
<style>
    .img-product{
        height: 230px;
    }
    .products-single{
        height: 350px;
    }
    .blog-content{
        height: 140px;
    }
</style>
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="assets/images/slide1.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="assets/images/slide2.png" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="assets/images/slidecage1.webp" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Reptiles & Supplies</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <?php foreach ($products as $product):?>
                <?php $url_detail = "index.php?controller=home&action=detail&id=" . $product['id']; ?>
            <div class="col-lg-3 col-md-6 special-grid">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale"><?php echo isset($product['sale']) && $product['sale'] != 0 ? "Sale" .' '. $product['sale'] . "%" : ''?></p>
                        </div>
                        <div class="img-product">
                            <img src="assets/uploads/<?php echo $product['avatar'] ?>" class="img-fluid" alt="Image" >
                        </div>
                        <div class="mask-icon">
                            <ul>
                                <li><a href="<?php echo $url_detail ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                            </ul>
                            <a data-id="<?php echo $product['id'] ?>" class="add-to-cart cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <?php if (isset($product['sale'])&&$product['sale']!= 0): ?>

                    <?php
                        $sale_price = $product['price'] - ($product['sale'] / 100 * $product['price'])
                    ?>
                    <div class="why-text">
                        <h4><?php echo $product['title']?></h4>
                        <h5><s><?php echo number_format($product['price'])?> đ</s></h5>
                        <h5><?php echo number_format($sale_price)?> đ</h5>
                    </div>
                    <?php else:?>
                    <div class="why-text">
                        <h4><?php echo $product['title']?></h4>
                        <h5> <?php echo number_format($product['price'])?> đ</h5>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php echo $pages; ?>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Latest blog</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($news as $new):?>
            <?php $url_detail = "index.php?controller=news&action=homedetail&id=" . $new['id']?>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img" style="height: 230px">
                        <img class="img-fluid" src="assets/uploads/<?php echo $new['avatar']?>" alt="Image" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3><?php echo $new['title']?></h3>
                        </div>
                        <ul class="option-blog">
                            <li><a href="<?php echo $url_detail?>"><i class="fas fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>