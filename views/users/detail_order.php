<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/12/2020
 * Time: 2:36 AM
 */
?>
<div class="container">
    <h2>Chi tiết đơn hàng</h2>
    <table cellpadding="20" cellspacing="5" style="text-align: center">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
        </tr>
        <?php foreach ($orders as $order):?>
        <tr>
            <td>
                <img class="product-avatar img-responsive" src="assets/uploads/<?php echo $order['avatar']?>"
                     width="80">
                <div class="content-product">
                    <?php echo $order['title']?>
                </div>
            </td>
            <td><?php echo $order['quantity']?></td>
            <td><?php echo number_format($order['price'])?> vnđ</td>
        </tr>
        <?php endforeach;?>
    </table>
    <a href="index.php?controller=user&action=order&id=<?php echo $_SESSION['user']['id']?>" class="btn btn-primary">Back</a>
</div>
