<?php
?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    Tên đăng nhập: <?php echo $user['username']?>
                </div>
                <div>

                </div>
                <div class="form-group">
                    First Name: <input class="form-control" type="text" name="first_name" value="<?php echo isset($user['first_name']) ? $user['first_name'] : '';?>">
                </div>
                <div class="form-group">
                    Last Name: <input class="form-control" type="text" name="last_name" value="<?php echo isset($user['last_name']) ? $user['last_name'] : '';?>">
                </div>
                <div class="form-group">
                    Số điện thoại: <input class="form-control" type="text" name="phone" value="<?php echo isset($user['phone']) ? $user['phone'] : '';?>">
                </div>
                <div class="form-group">
                    Địa chỉ: <input class="form-control" type="text" name="address" value="<?php echo isset($user['address']) ? $user['address'] : '';?>">
                </div>
                <div class="form-group">
                    Email: <input class="form-control" type="text" name="email" value="<?php echo isset($user['email']) ? $user['email'] : '';?>">
                </div>
            </div>
            <div class="col-md-4 align-content-center" style="padding: 50px">
                <h3>Ảnh đại diện</h3>
                <div class="form-group">
                    <img style="border-radius: 50%; border: solid 1px #3C8DBC;" height="120" src="assets/uploads/<?php echo isset($user['avatar']) ? $user['avatar'] : 'user.png'?>"/>
                </div>
                <div>
                    <input class="form-group btn" type="file" name="avatar" value="">
                    <p style="color: #999999">Dung lượng file tối đa: 2 MB</p>
                    <p style="color: #999999">Định dạng: JPEG, PNG</p>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Lưu" class="btn btn-success"> <a style="color: white" class="btn hvr-hover" href="index.php?controller=user&action=changepassword">Đổi mật khẩu</a>
    </form>
</div>


