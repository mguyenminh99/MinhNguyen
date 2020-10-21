<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/10/2020
 * Time: 4:50 PM
 */
?>
<h3>Thông tin khách hàng</h3>
<table cellspacing="10" cellpadding="10">
    <tr>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Ghi chú</th>
        <th>Tổng số tiền</th>
        <th>Tình trạng</th>
    </tr>
    <tr>
        <td><?php echo $order[0]['fullname']?></td>
        <td><?php echo $order[0]['address']?></td>
        <td><?php echo isset($order[0]['mobile']) ? $order[0]['mobile'] : ''?></td>
        <td><?php echo $order[0]['email']?></td>
        <td><?php echo $order[0]['note']?></td>
        <td><?php echo number_format($order[0]['price_total'])?> vnđ</td>
        <?php if ($order[0]['payment_status'] == 1):?>
        <td>Đã thanh toán</td>
        <?php else:?>
        <td>Chưa thanh toán</td>
        <?php endif;?>
    </tr>
</table>
<h3>Thông tin đơn hàng</h3>
<table cellpadding="10" cellspacing="10">
    <tr>
        <th>Tên mặt hàng</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
    </tr>
    <?php foreach ($order as $value):?>
    <tr>
        <td><?php echo $value['title']?></td>
        <td><?php echo $value['quantity']?></td>
        <td><?php echo number_format($value['price'])?> vnđ</td>
    </tr>
    <?php endforeach;?>
</table>
<br>
<a href="index.php?controller=orders&action=index" class="btn btn-primary">Back</a>