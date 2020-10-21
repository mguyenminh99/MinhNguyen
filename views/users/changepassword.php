<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/5/2020
 * Time: 5:39 PM
 */
?>
<div class="container">
    <h2>Đổi mật khẩu</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="password">Mật khẩu hiện tại:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="new-password">Mật khẩu mới</label>
            <input type="password" name="new-password" class="form-control">
        </div>
        <div class="form-group">
            <label for="re-password">Nhập lại mật khẩu mới</label>
            <input type="password" name="re-password" class="form-control">
        </div>
        <div class="form-group"><input type="submit" name="submit" value="Lưu" class="form-control btn btn-success"></div>
    </form>
</div>
