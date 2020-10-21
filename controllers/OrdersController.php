<?php
require_once 'controllers/Controller.php';
require_once 'models/Orders.php';
require_once 'controllers/UserController.php';
class OrdersController extends Controller
{
    public function __construct() {
        //kiểm tra nếu user chưa đăng nhập thì ko cho phép
        //truy cập các chức năng, chuyển hướng về trang login
        //cần phải loại trừ controller=user
        if (!isset($_SESSION['user']) && $_GET['controller'] != 'user') {
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            header('Location: index.php?controller=user&action=login');
            exit();
        }
    }
    public function index(){
        $id = $_SESSION['user']['id'];
        $user_model = new User();
        $user = $user_model->getById($id);
        $order_model = new Orders();
        $orders = $order_model->getAll();
        $this->content = $this->render('views/orders/index.php',[
            'orders' => $orders,
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID order không hợp lệ';
            header('Location: index.php?controller=orders&action=index');
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Orders();
        $order = $order_model->getOdersById($id);
        if (isset($_POST['submit'])){
            $name = $_POST['full_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $note  = $_POST['note'];
            $payment_status = $_POST['status'];
            if (empty($name)||empty($address)||empty($email)||empty($mobile)){
                $this->error = 'Không được để trống';
            }
            if (empty($this->error)){
                $order_model = new Orders();
                $order_model->fullname = $name;
                $order_model->address = $address;
                $order_model->email = $email;
                $order_model->mobile = $mobile;
                $order_model->note = $note;
                $order_model->payment_status = $payment_status;
                $order_model->update_at = date('Y-m-d H:i:s');
                $is_update = $order_model->update($id);
                if ($is_update){
                    $_SESSION['success'] = 'Update thành công';
                    header('location:index.php?controller=orders&action=index');
                    exit();
                }
                else{
                    $_SESSION['error'] = 'Update thất bại';
                    header('location:index.php?controller=orders&action=index');
                    exit();
                }

            }

        }
        $this->content = $this->render('views/orders/update.php',[
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }
    public function detail(){
        $id = $_GET['id'];
        $order_model = new Orders();
        $order = $order_model->getOrderDetail($id);
        $this->content = $this->render('views/orders/detail.php',[
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        $id = $_GET['id'];
        $model = new Orders();
        $is_delete = $model->delete($id);
        if ($is_delete){
            $_SESSION['success'] = "xóa thành công";
        }
        else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        header('location: index.php?controller=orders&action=index');
        exit();
    }
}