<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
require_once 'models/Feedback.php';
require_once 'models/News.php';
require_once 'models/Contact.php';
class HomeController extends Controller{
    public function index(){
        $product_model = new Product();
        $count_total = $product_model->countTotal();
        $news_model = new News();
        $news = $news_model->getLatest();
        //        xử lý phân trang
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        if (isset($_GET['home-search'])){
            $text = $_GET['text'];
            $products = $product_model->getAllbyText($text);
            $this->content = $this->render('views/homes/category.php',[
                'products' => $products
            ]);
            require 'views/layouts/home_main.php';
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 8,
            'query_string' => 'page',
            'controller' => 'home',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $products = $product_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $this->content = $this->render('views/homes/index.php',[
            'products' => $products,
            'pages' => $pages,
            'news' => $news
        ]);
        require 'views/layouts/home_main.php';
    }
    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home&action=index');
            exit();
        }

        $id = $_GET['id'];
        if (isset($_POST['submit'])){
            $comment = $_POST['comment'];
            $rateStar = $_POST['star'];
            $rateStar++;
            $model = new Feedback();
            $model->star = $rateStar;
            $model->user_id = $_SESSION['user']['id'];
            $model->product_id = $id;
            $model->comment = $comment;
            $model->addFeedback();
        }
        $model_feedback = new Feedback();
        $feedback = $model_feedback->getFeedback($id);
        if (isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];
            $check = $model_feedback->check($id,$user_id);
        }

        $model_product = new Product();
        $product = $model_product->getById($id);
        $this->content = $this->render('views/homes/detail.php',[
            'product' => $product,
            'feedback' => $feedback,
            'check' => $check
        ]);
        require_once 'views/layouts/home_main.php';
    }
    public function products(){
        $id = $_GET['id'];
        $model = new Product();
        $products = $model->getAllbyCid($id);
        $this->content = $this->render('views/homes/category.php',[
            'products' => $products
        ]);
        require_once 'views/layouts/home_main.php';
    }
    public function ratestar(){
        $rateStar = $_GET['ratedIndex'];
        $this->content = $this->render('views/homes/popup.php',[
            'ratedIndex' => $rateStar
        ]);
        echo $this->content;
    }
    public function contact(){
        if (isset($_POST['submit'])){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $contact_model = new Contact();
            $contact_model->name = $name;
            $contact_model->email = $email;
            $contact_model->subject = $subject;
            $contact_model->message = $message;
            $is_insert = $contact_model->insert();
            if ($is_insert){
                $_SESSION['success'] = "Cảm ơn bạn đã phản hồi cho chúng tôi";
                header('location: index.php?controller=home&action=index');
                exit();
            }
            else{
                $_SESSION['error'] = "Phản hồi thất bại";
                header('location: index.php?controller=home&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/homes/contact.php');
        require_once 'views/layouts/home_main.php';
    }
    public function location(){
        $this->content = $this->render('views/homes/location.php');
        require_once 'views/layouts/home_main.php';
    }
}
?>