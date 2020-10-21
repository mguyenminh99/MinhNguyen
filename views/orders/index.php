<?php
?>
<h2>Danh sách đơn hàng</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Notes</th>
        <th>Price Total</th>
        <th>Payment Status</th>
        <th>Create At</th>
        <th>Update At</th>
        <th></th>
    </tr>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?php echo $order['id']; ?>
                </td>
                <td>
                    <?php echo $order['user_id']; ?>
                </td>
                <td>
                    <?php echo $order['address']; ?>
                </td>
                <td>
                    <?php echo $order['mobile']; ?>
                </td>
                <td>
                  <?php echo $order['email']; ?>
                </td>
                <td>
                    <?php echo $order['note']; ?>
                </td>
                <td>
                    <?php echo $order['price_total'] ?>
                </td>
                <td>
                    <?php
                    $status_text = 'Đã Thanh Toán';
                    if ($order['payment_status'] == 0) {
                        $status_text = 'Chưa Thanh Toán';
                    }
                    echo $status_text;
                    ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])); ?>
                </td>
                <td>
                    <?php
                    if (!empty($order['updated_at'])) {
                        echo date('d-m-Y H:i:s', strtotime($order['updated_at']));
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=orders&action=detail&id=<?php echo $order['id'] ?>" title="Chi tiết">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="index.php?controller=orders&action=update&id=<?php echo $order['id'] ?>" title="Sửa">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a href="index.php?controller=orders&action=delete&id=<?php echo $order['id']?>" title="Xóa"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>

    <?php else: ?>
        <tr>
            <td colspan="7">Không có bản ghi nào</td>
        </tr>
    <?php endif; ?>
</table>
