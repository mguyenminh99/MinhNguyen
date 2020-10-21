<style>
    .product-avatar{
        height: 250px;
    }
</style>
<div class="container">
<div class="row">
<?php foreach ($products as $product):?>
            <?php $url_detail = "index.php?controller=home&action=detail&id=" . $product['id']; ?>
            <div class="col-lg-3 col-md-6 special-grid">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">sale</p>
                        </div>
                        <div class="product-avatar">
                            <img src="assets/uploads/<?php echo $product['avatar'] ?>" class="img-fluid" alt="Image" height="200">
                        </div>
                        <div class="mask-icon">
                            <ul>
                                <li><a href="<?php echo $url_detail ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                            </ul>
                            <a data-id="<?php echo $product['id'] ?>" class="cart add-to-cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4><?php echo $product['title']?></h4>
                        <h5> <?php echo number_format($product['price'])?> VNĐ</h5>
                    </div>
                </div>
            </div>
<?php endforeach;?>
</div>
</div>