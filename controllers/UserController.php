<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Orders.php';
//controllers/UserController.php
//Dùng để control đối tượng users
//Kế thừa từ class Controller cha để có thể sử dụng luôn
//2 thuộc tính: error, content
//1 phương thức: render
class UserController extends Controller {
    //url: index.php?controller=user&action=register
    public function register() {
        // + Xử lý submit form khi user click Đăng ký
        if (isset($_POST['register'])) {
            //Gán biến trung gian
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];
            //Xử lý validate form:
            // + Tất cả các trường ko ddc để trống
            // + Mật khẩu phải trùng nhau
            if (empty($username) || empty($password) ||
            empty($confirm_password)) {
                $this->error = 'Ko đc để trống';
            } elseif ($password != $confirm_password) {
                $this->error = 'Mật khẩu chưa trùng nhau';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->error = 'Phải nhập đúng định dạng email';
            }
            // nếu như ko có lỗi thì xử lý đăng ký user
            if (empty($this->error)) {
                // kiểm tra xem username đã tồn tại trong
//                bảng users chưa
                // Gọi model để xử lý, tạo model User
                $user_model = new User();
                $is_username_exists =
                    $user_model->isUsernameExists($username);
                //nếu username đã tồn tại sẽ báo lỗi
                if ($is_username_exists) {
                    $this->error = 'Username đã tồn tại';
                } else {
                    //đăng ký user
                    //cần lưu mật khẩu dưới dạng mã hóa
                    $password = md5($password);
                    $is_register =
                        $user_model->register($username, $password, $email);
//                    var_dump($is_register);
                    if ($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                        //chuyển hướng sang trang login
                        header('Location: index.php?controller=user&action=login');
                        exit();
                    } else {
                        $this->error = "Không thể đăng ký";
                    }
                }
            }
        }

        //set title cho chức năng đăng ký
        $this->title_page = 'Trang đăng ký user';
        // + Tạo views tương ứng theo cấu trúc sau:
        //views/users/
       //             /register.php
        // + Do giao diện trang đăng ký hoàn toàn khác so
        //với giao diện chính của backend, nên cần tạo 1 layout
        //khác: views/layouts/main_login.php

        //+ Lấy nội dung view
        $this->content =
            $this->render('views/users/register.php');
        // + Gọi layout để hiển thị nội dung view vừa lấy đc
        require_once 'views/layouts/main_login.php';
    }

    //Phương thức xử lý login
    public function login() {
        //XỬ LÝ SUBMIT FORM
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Xử lý validate, ko đc để trống 2 trường
            if (empty($username) || empty($password)) {
                $this->error = 'Phải nhập cả 2 trường';
            }
            //Xử lý đăng nhập chỉ khi ko có lỗi nào xảy ra
            if (empty($this->error)) {
                $user_model = new User();
                //cần mã hóa password đúng theo cơ chế đã lưu
                //password này trc khi kiểm tra trong CSDL
                $password = md5($password);
                // Do cần hiển thị thông tin user sau khi login
                //thành công, nên kêt quả trả về xử lý hàm
                //getUser là 1 mảng, gán mảng đó cho session

                $user = $user_model
                    ->getUser($username, $password);
                //nếu đăng nhập thành công
                if (!empty($user)&&$user['role']!=0&&$user['role']!=1) {
                    //Tạo session gán bằng mảng user trên
                    $_SESSION['user'] = $user;
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    header("Location: index.php?controller=home&action=index");
                    exit();
                } elseif (!empty($user)&&($user['role']==0||$user['role']==1)){
                    $_SESSION['user'] = $user;
                    $_SESSION['success'] = 'Đăng nhập thành công vào trang quản lý';
                    header("location: index.php?controller=category&action=index");
                    exit();
                }
                elseif (empty($user)){
                    $this->error = "Sai tên đăng nhập hoặc mật khẩu";
                }
//                echo "<pre>";
//                print_r($user);
//                echo "</pre>";
//                die;
            }
        }

        $this->title_page = 'Trang đăng nhập';

        // + Lấy nội dung view login tương ứng,
        //tạo view: views/users/login.php
        $this->content = $this->render('views/users/login.php');
        // + Gọi layout để hiển thị
        require_once 'views/layouts/main_login.php';
    }
    public function index(){
        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getById($id);
        if (isset($_POST['submit'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $jobs = $_POST['jobs'];
            if (!is_numeric($phone)){
                $this->error = 'Cần nhập đúng số điện thoại';
            }
            if ($_FILES['avatar']['error'] == 0){
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }
            if (empty($this->error)){
                $filename = $user['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
            }
            $user_model = new User();
            $user_model->first_name = $first_name;
            $user_model->last_name = $last_name;
            $user_model->email = $email;
            $user_model->phone = $phone;
            $user_model->address = $address;
            $user_model->avatar = $filename;
            $user_model->jobs = $jobs;
            $is_update = $user_model->update($id);
            if ($is_update){
                echo $_SESSION['success'] = 'Lưu thành công';
                unset($_SESSION['success']);
            }
            else{
                $this->error = "Lưu thất bại";
            }

        }
        $this->title_page = 'Profile';

        $this->content = $this->render('views/users/index.php',[
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }
    public function index2()
    {
        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getById($id);
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $jobs = $_POST['jobs'];
            if (!is_numeric($phone)){
                $this->error = 'Cần nhập đúng số điện thoại';
            }
            if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }
            if (empty($this->error)) {
                $filename = $user['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
            }
            $user_model = new User();
            $user_model->first_name = $first_name;
            $user_model->last_name = $last_name;
            $user_model->email = $email;
            $user_model->phone = $phone;
            $user_model->address = $address;
            $user_model->avatar = $filename;
            $user_model->jobs = $jobs;
            $is_update = $user_model->update($id);
            if ($is_update) {
                echo $_SESSION['success'] = 'Lưu thành công';
                unset($_SESSION['success']);
            } else {
                $this->error = "Lưu thất bại";
            }

        }
        $this->title_page = 'Profile';

        $this->content = $this->render('views/users/index.php', [
            'user' => $user
        ]);
        require_once 'views/layouts/home_main.php';
    }
    public function logout(){
        unset($_SESSION['user']);
        header('location:index.php?controller=home&action=index');
        exit();
    }
    public function changepassword(){
        if (!isset($_SESSION['user'])){
            $_SESSION['error'] = "Bạn chưa đăng nhập";
            header('location: index.php?controller=home&action=index');
            exit();
        }else{
            $id = $_SESSION['user']['id'];
            if (isset($_POST['submit'])){
                $password = $_POST['password'];
                $password = md5($password);
                $new_password = $_POST['new-password'];
                $re_password = $_POST['re-password'];
                if (empty($password||empty($new_password)||empty($re_password))){
                    $this->error = "Cần nhập đủ tất cả các trường";
                }
                $user_model = new User();
                $is_corect_password = $user_model->isCorectPassword($password,$id);
                if (empty($is_corect_password)){
                    $this->error = "Bạn nhập sai mật khẩu cũ";
                }
                elseif ($new_password != $re_password){
                    $this->error = "Mật khẩu mới mà nhập lại mật khẩu mới không khớp";
                }
                if (empty($this->error)){
                    $new_password = md5($new_password);
                    $user_model->password = $new_password;
                    $is_change = $user_model->changePassword($id);
                    if ($is_change){
                        $_SESSION['success'] = "Đổi mật khẩu thành công";
                        header("location: index.php?controller=home&action=index");
                        exit();
                    }
                    else{
                        $_SESSION['error'] = "Đổi mật khẩu thất bại";
                        header("location: index.php?controller=home&action=index");
                        exit();
                    }
                }
            }
            $this->title_page = 'Đổi mật khẩu';
            $this->content = $this->render('views/users/changepassword.php');
            require_once 'views/layouts/home_main.php';
        }
    }
    public function order(){
        $id = $_GET['id'];
        $order_model = new Orders();
        $orders = $order_model->getOrderByUserId($id);
        $this->content = $this->render('views/users/order.php',[
            'orders' => $orders
        ]);
        require_once 'views/layouts/home_main.php';
    }
    public function detailorder(){
        $id = $_GET['id'];
        $order_model = new Orders();
        $orders = $order_model->getOrderDetail($id);
//        echo "<pre>";
//        print_r($orders);
//        echo "</pre>";
        $this->content = $this->render('views/users/detail_order.php',[
            'orders' => $orders
        ]);
        require_once 'views/layouts/home_main.php';
    }
}