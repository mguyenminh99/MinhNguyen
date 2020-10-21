<?php
/**
 * views/users/login.php
 * Form đăng nhập
 */
?>
<style>
    .container{
        width: 35%;
        margin-top: 100px;
        border-radius: 8%;
    }
    h2{
        height: 100px;
    }
    .login{
        padding: 20px 50px;
        text-align: center;

    }
    .username, .password{
        margin-top: 30px;
    }
    .input{
        border-radius: 20px;
        height: 50px;

    }
    .forgot-password{
        margin-left: 300px;
        font-size: 13px;
        margin-top: 10px;
    }
</style>
<form class="container" action="" method="post">
    <div class="login">
                <h2>Đăng nhập</h2>
            <div class="username">
                <input type="text" name="username" id="username" placeholder="Tài khoản"
                       class="form-control input"/>
            </div>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Mật khẩu"
                       class="form-control input"/>
            </div>
            <div class="forgot-password">
                <p><a href="#">Quên tài khoản hoặc mật khẩu?</a></p>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="login" value="Đăng nhập"
                       class="btn btn-primary"/>
            </div>
            <p>
                Chưa có tài khoản,
                <a href="index.php?controller=user&action=register">
                    Đăng ký
                </a> ngay.
            </p>
            <br>
    </div>
</form>
