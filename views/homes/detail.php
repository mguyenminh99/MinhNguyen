<?php

?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="products-single fix">
                <div class="box-img-hover">
                    <div class="type-lb">
                        <p class="sale"><?php if ($product['sale'] != 0){
                                echo "sale" . ' '. $product['sale'] . "%";
                            }
                            else echo '';?></p>
                    </div>
                    <img height="200" src="assets/uploads/<?php echo $product['avatar'] ?>" class="img-fluid" alt="Image">
                </div>
                    <div class="why-text">
                        <h4><?php echo $product['title']?></h4>
                    </div>
                <div>
                    <?php if (isset($product['sale'])&&$product['sale']!= 0):  $sale_price = $product['price'] - ($product['sale'] / 100 * $product['price'])?>
                        <h5> <del><?php echo number_format($product['price'])?> đ</del> <span style="color: #b0b435; margin-left: 5px; font-size: 20px"><?php echo number_format($sale_price)?> đ</span></h5>
                    <?php else:?>
                        <b><?php echo number_format($product['price'])?> đ</b>
                    <?php endif;?>
                    <br>
                    <a href="#" class="btn hvr-hover add-to-cart" style="color: white">Add to cart</a>
                    <br>
                    <?php if (isset($_SESSION['user'])):?>
                        <?php if (empty($check)):?>
                            <label for="rate-us">Đánh giá sản phẩm này:</label>
                            <button style="background: white; border: none" data-toggle="modal" data-target="#myModal"><i class="fa fa-star star-rate" data-index="0"></i><i class="fa fa-star star-rate" data-index="1"></i><i class="fa fa-star star-rate" data-index="2"></i><i class="fa fa-star star-rate" data-index="3"></i><i class="fa fa-star star-rate" data-index="4"></i></button>
                            <br>
                        <?php endif;?>
                    <?php endif;?>
                </div>
            </div>
            <div id="showpopup">

            </div>
            <div>
                <div><h2>Bình luận</h2></div>
                <?php foreach ($feedback as $user):?>
                    <?php if ($user['product_id'] == $product['id']): ?>
                    <div class="container" style="border: 1px solid grey; width: 1110px">
                        <div class="comment row">
                            <div style="padding: 20px"><img style=" border-radius: 50%; border: 1px red solid;" height="40" src="assets/uploads/<?php echo $user['avatar'] ?>" alt=""></div>
                            <div>
                                 <div class="row">
                                    <div style="font-size: 25px; margin-left: 12px"><?php echo $user['username']?></div>
                                    <div style="margin-top: 11px; margin-left: 5px">
                                        <?php if ($user['star'] == 1): ?>
                                            <i style="color: red" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php elseif ($user['star'] == 2): ?>
                                            <i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php elseif ($user['star'] == 3): ?>
                                            <i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php elseif ($user['star'] == 4): ?>
                                            <i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php elseif ($user['star'] == 5): ?>
                                            <i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i><i style="color: red" class="fas fa-star"></i>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div>
                                    <div style="font-size: 10px"><?php echo $user['created_at']?></div>
                                    <div><?php echo $user['comment']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
        <div class="col-lg-9 col-md-6">
            <?php echo $product['content']?>
        </div>
    </div>
</div>
