<?php
require_once 'helpers/Helper.php';
?>
<style>
    .btn-theme:hover {
        background: #b0b435;
    }
    .btn-theme{
        background: #000000;
        color: #ffffff;
        border: none;
        border-radius: 0px;
        font-size: 16px;
        padding: 10px 20px;
    }
</style>
<div class="timeline-items container">
    <h2>Giỏ hàng của bạn</h2>
    <?php if (isset($_SESSION['cart'])):?>
        <form action="" method="post">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th width="40%">Tên sản phẩm</th>
                    <th width="12%">Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>

                <?php
                // khai báo biến lưu tổng giá trị đơn hàng
                $total_cart = 0;
                foreach ($_SESSION['cart'] as $product_id => $cart):
                    ?>
                    <tr>
                        <td>
                            <img class="product-avatar img-responsive" src="assets/uploads/<?php echo $cart['avatar']?>"
                                 width="80">
                            <div class="content-product">
                                <a href="index.php?controller=home&action=detail&id=<?php echo $product_id?>" class="content-product-a">
                                    <?php echo $cart['name']?> </a>
                            </div>
                        </td>
                        <td>
                            <!--    cần khéo léo đặt name cho input số lượng, để khi xử lý submit form update lại giỏ hànTin nổi bậtg sẽ đơn giản hơn    -->
                            <input type="number" min="0" name="<?php echo $product_id?>"
                                   class="product-amount form-control"
                                   value="<?php echo $cart['quantity']?>">
                        </td>
                        <td>
                            <?php echo number_format($cart['price'])?>
                        </td>
                        <td>
                            <?php
                            $total_item = $cart['price'] * $cart['quantity'];
                            echo number_format($total_item);
                            $total_cart += $total_item;
                            ?>
                        </td>
                        <td>
                            <a class="content-product-a" href="index.php?controller=cart&action=delete&id=<?php echo $product_id?>">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="5" style="text-align: right">
                        Nhập mã giảm giá: <input type="text" name="sale" class="sale"> <br>
                        <div class="sale-info"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right">
                        Tổng giá trị đơn hàng:
                        <span class="product-price">
                                           <?php echo number_format($total_cart)?>
                                                </span>
                    </td>
                </tr>
                <?php if (isset($_SESSION['discount'])){
                    $discount_price = $total_cart - ($_SESSION['discount']['discount_num']/ 100 * $total_cart);
                }?>
                <?php if (isset($_SESSION['discount'])):?>
                <tr>
                    <td colspan="5" style="text-align: right">
                        Tổng giá trị đơn hàng sau khi được giảm giá:
                        <span class="product-price">
                                           <?php echo number_format($discount_price)?>
                                                </span>
                    </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="5" class="product-payment">
                        <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-theme">
                        <a href="index.php?controller=payment&action=index" class="btn btn-theme">Đến trang thanh toán</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    <?php else:?>
        <h2>Giỏ hàng trống</h2>
        <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
    <?php endif;?>
</div>
<!--Timeline items end -->