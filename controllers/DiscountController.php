<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/30/2020
 * Time: 7:09 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Discount.php';
class DiscountController extends Controller
{
    public function check()
    {
        $key_word = $_GET['sale'];
        $obj_discount = new Discount();
        $discount = $obj_discount->getDiscount($key_word);
        if (!empty($discount)) {
            if (time() > strtotime($discount['begin_sale']) && time() < strtotime($discount['end_sale'])) {
                if (!isset($_SESSION['discount'])) {
                    $_SESSION['discount'] = [
                        'discount_num' => $discount['discount_num']
                    ];
                    echo "Bạn được giảm " . $discount['discount_num'] . '%';
                } else {
                    echo "Bạn chỉ được dùng 1 mã giảm giá cho 1 đơn hàng";
                }
            } elseif (time() < strtotime($discount['begin_sale'])) {
                echo "Mã giảm giá của bạn chưa được kích hoạt";
            } elseif (time() > strtotime($discount['end_sale'])) {
                echo "Mã giảm giá của bạn đã hết hạn";
            }
        }
        if (empty($discount)) {
            echo "Mã giảm giá của bạn khôgn tồn tại";
        }
    }
    public function index(){
        $sale_model = new Discount();
        $discounts = $sale_model->getAll();
        $this->content = $this->render('views/discount/index.php',[
            'discounts' => $discounts
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        if (isset($_POST['submit'])){
            $key_word = $_POST['key_word'];
            $discount_num = $_POST['discount_num'];
            $begin_sale = $_POST['begin_sale'];
            $end_sale = $_POST['end_sale'];
            if (empty($key_word)||empty($discount_num)||empty($begin_sale)||empty($end_sale)){
                $this->error = "Phải nhập đủ hết các trường";
            }
            if (strtotime($begin_sale)>strtotime($end_sale)){
                $this->error = "Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc";
            }
            if (empty($this->error)){
                $discount_model = new Discount();
                $discount_model->key_word = $key_word;
                $discount_model->discount_num = $discount_num;
                $discount_model->begin_sale = $begin_sale;
                $discount_model->end_sale = $end_sale;
                $is_insert = $discount_model->create();
                if ($is_insert){
                    $_SESSION['success'] = "Tạo mới thành công";
                    header('location: index.php?controller=discount&action=index');
                    exit();
                }
                else{
                    $_SESSION['error'] = "Tạo mới thất bại";
                    header('location: index.php?controller=discount&action=index');
                    exit();
                }
            }
        }
        $this->content = $this->render('views/discount/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        $id = $_GET['id'];
        if (isset($_POST['submit'])){
            $key_word = $_POST['key_word'];
            $discount_num = $_POST['discount_num'];
            $begin_sale = $_POST['begin_sale'];
            $end_sale = $_POST['end_sale'];
            if (empty($key_word)||empty($discount_num)||empty($begin_sale)||empty($end_sale)){
                $this->error = "Phải nhập đủ hết các trường";
            }
            if (strtotime($begin_sale)>strtotime($end_sale)){
                $this->error = "Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc";
            }
            if (empty($this->error)){
                $discount_model = new Discount();
                $discount_model->key_word = $key_word;
                $discount_model->discount_num = $discount_num;
                $discount_model->begin_sale = $begin_sale;
                $discount_model->end_sale = $end_sale;
                $is_insert = $discount_model->update($id);
                if ($is_insert){
                    $_SESSION['success'] = "Cập nhật thành công";
                    header('location: index.php?controller=discount&action=index');
                    exit();
                }
                else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                    header('location: index.php?controller=discount&action=index');
                    exit();
                }
            }
        }
        $discount_model = new Discount();
        $coupon = $discount_model->getById($id);
        $this->content = $this->render('views/discount/update.php',[
            'coupon' => $coupon
        ]);
        require_once 'views/layouts/main.php';
    }
}
