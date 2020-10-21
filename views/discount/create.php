<?php
?>
<h2>Tạo mã giảm giá</h2>
<form action="" method="post">
    <div class="form-group">
        <label for="">Mã giảm giá</label>
        <input type="text" name="key_word" class="form-control">
    </div>
    <div class="form-group">
        <label for="">% giảm giá</label>
        <input type="number" name="discount_num" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Ngày bắt đầu</label>
        <input type="date" name="begin_sale" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc</label>
        <input type="date" name="end_sale" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tạo mới" class="btn btn-success">
    </div>
</form>
