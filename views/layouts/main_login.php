<?php
/**
 * views/layouts/main_login.php
 * Xây dựng 1 cấu trúc layout dạng HTML, tích hợp bootstrap
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8"/>
    <!--  cần xử lý động cho các trường seo này theo cơ chế
      tương tự như title page và nội dung view động-->
    <meta name="title" content="Seo Meta title"/>
    <meta name="description" content="Seo Meta description"/>
    <meta name="keywords" content="Seo Meta keyword"/>
    <title>
        <?php echo $this->title_page; ?>
    </title>
    <!--  Tích hợp Bootstrap vào hệ thống  -->
    <link href="assets/css/bootstrap.min.css"
          rel="stylesheet"/>
</head>
<body>
<div class="header"></div>
<div class="main-content">
    <div class="container">
        <!--      Hiển thị tập trung tất cả lỗi như validate,
              session, thông báo thành công ở file layout
              -->
        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php echo $this->error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
    </div>

    <?php echo $this->content; ?>
</div>
<div class="footer"></div>
<!--    Tích hợp jQuery và Bootstrap -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>


