<?php
/**
 * views/users/register.php
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
</style>
<div class="container">
    <form action="" method="post">
        <div class="login">
            <h2>Đăng ký</h2>
            <div class="username">
                <input type="text" name="username" id="username" placeholder="Tài khoản"
                       class="form-control input"/>
            </div>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Mật khẩu"
                       class="form-control input"/>
            </div>
            <div class="password">
                <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu"
                       class="form-control input">
            </div>
            <div class="password">
                <input type="email" name="email" placeholder="email"
                       class="form-control input">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="register" value="Đăng ký"
                       class="btn btn-primary" />
            </div>
            <br>
        </div>
    </form>
</div>
