<?php
//views/payments/mail_template_order.php
?>
Cảm ơn bạn đã mua hàng
Thông tin đơn hàng:
<div class="container">
    <h2>Thanh toán</h2>
    <h1>Reptile Shop</h1>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin khách hàng</h3>
                <table cellpadding="10" cellspacing="10" style="text-align: center">
                    <tr>
                        <td>Họ tên:</td>
                        <td><?php echo $_SESSION['payment_info']['fullname']?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><?php echo $_SESSION['payment_info']['address'] ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><?php echo $_SESSION['payment_info']['mobile']?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION['payment_info']['email']?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin đơn hàng của bạn</h3>
                <?php
                //biến lưu tổng giá trị đơn hàng
                $total = 0;
                if (isset($_SESSION['cart'])):
                    ?>
                    <table cellpadding="10" cellspacing="10" style="text-align: center">
                        <tbody>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                            ?>
                            <tr>
                                <td>
                                    <div class="content-product">
                                        <a href="index.php?controller=home&action=detail&id=<?php echo $product_id?>" class="content-product-a">
                                            <?php echo $cart['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                              <span class="product-amount">
                                  <?php echo $cart['quantity']; ?>
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">
                                 <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">
                                  <?php
                                  $price_total = $cart['price'] * $cart['quantity'];
                                  $total += $price_total;
                                  ?>
                                  <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                              </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (isset($_SESSION['discount'])):?>
                            <tr>
                                <td colspan="5  ">
                                    Bạn được giảm <?php echo $_SESSION['discount']['discount_num']?>%
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="product-total">
                                    Tổng giá trị đơn hàng:
                                    <span class="product-price">
                                        <?php $total = $total - ($_SESSION['discount']['discount_num']/ 100 * $total)?>
                                        <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                                </td>
                            </tr>
                        <?php else:;?>
                            <tr>
                                <td colspan="5" class="product-total">
                                    Tổng giá trị đơn hàng:
                                    <span class="product-price">
                                <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                                </td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
</div>