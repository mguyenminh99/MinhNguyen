<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/12/2020
 * Time: 2:00 AM
 */
?>
<div class="container">
    <h2>Đơn hàng của bạn</h2>
    <table cellspacing="10" cellpadding="10" style="text-align: center">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tổng giá trị đơn hàng</th>
            <th></th>
        </tr>
        <?php if (!empty($orders)):?>
            <?php foreach ($orders as $order):?>
                <tr>
                    <td><?php echo $order['id']?></td>
                    <td><?php echo $order['fullname']?></td>
                    <td><?php echo $order['address']?></td>
                    <td><?php echo $order['mobile']?></td>
                    <td><?php echo $order['email']?></td>
                    <td><?php echo number_format($order['price_total'])?> vnđ</td>
                    <td>
                        <a class="btn btn-info" href="index.php?controller=user&action=detailorder&id=<?php echo $order['id']?>">Chi tiết</a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else:?>
            <tr>
                <td>Bạn chưa có đơn hàng nào</td>
            </tr>
        <?php endif;?>
</div>
</table>
<br>
<a class="btn btn-primary" href="index.php?controller=home&action=index">Back</a>