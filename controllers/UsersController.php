<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Pagination.php';

class UsersController extends Controller
{
    public function __construct() {
        //kiểm tra nếu user chưa đăng nhập thì ko cho phép
        //truy cập các chức năng, chuyển hướng về trang login
        //cần phải loại trừ controller=user
        if (!isset($_SESSION['user'])&&$_GET['controller'] != 'user') {
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            header('Location: index.php?controller=user&action=login');
            exit();
        }
        elseif (!isset($_SESSION['user'])||($_SESSION['user']['role']!=1)){
            $_SESSION['error'] = "Bạn không đủ quyèn để sử dụng chức năng này";
            header('location: index.php?controller=category&action=index');
            exit();
        }
    }
    public function index(){
        $user_model = new User();
        $users = $user_model->getAll();
        $this->content=$this->render('views/users_control/index.php',[
            'users' => $users
        ]);
        require_once 'views/layouts/main.php';
    }
    public function update(){
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
            $status = $_POST['status'];
            $role = $_POST['role'];
            //xử lý validate
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if (!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) {
                $this->error = 'Link facebook không đúng định dạng url';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $filename = $user['avatar'];
                //xử lý upload ảnh nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    //xóa file ảnh đã update trc đó
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //lưu password dưới dạng mã hóa, hiện tại sử dụng cơ chế md5
                $user_model->first_name = $first_name;
                $user_model->last_name = $last_name;
                $user_model->phone = $phone;
                $user_model->address = $address;
                $user_model->email = $email;
                $user_model->avatar = $filename;
                $user_model->jobs = $jobs;
                $user_model->status = $status;
                $user_model->role = $role;
                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=users&action=index');
                exit();
            }
        }
        $this->content= $this->render('views/users_control/update.php',[
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }
}