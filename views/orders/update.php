<?php if (empty($order)): ?>
    <h2>Không tồn tại đơn hàng</h2>
<?php else: ?>
    <h2>Chỉnh sửa đơn hàng #<?php echo $order['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên khách hàng</label>
            <input type="text" name="full_name"
                   value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $order['fullname']; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address"
                   value="<?php echo isset($_POST['address']) ? $_POST['address'] : $order['address']; ?>"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="number" class="form-control" id="mobile"
                      name="mobile" value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $order['mobile']; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"
                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $order['email']; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="note">Notes</label>
            <textarea name="note" id="note"><?php echo isset($_POST['note']) ? $_POST['note'] : $order['note']; ?></textarea>
        </div>
        <div class="form-group">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($order['payment_status'])) {
                switch ($order['payment_status']) {
                    case 0:
                        $selected_0 = 'selected';
                        break;
                    case 1:
                        $selected_1 = 'selected';
                        break;
                }
            }
            ?>
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0" <?php echo isset($selected_0) ? $selected_0 : '' ?> >Chưa thanh toán</option>
                <option value="1" <?php echo isset($selected_1) ? $selected_1 : ''  ?> >Đã thanh toán</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    </form>
<?php endif; ?>