<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Category.php';
class NewsController extends Controller{
    public function index(){
        $model_news = new News();
        $news = $model_news->getAll();
        $this->content = $this->render('views/news/index.php', [
            'news' => $news
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create()
    {
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            if (empty($title) || empty($content)) {
                $this->error = "Title hoặc nội dung không được để trống";
            } else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                }
            }
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-news-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
            }

            $news_model = new News();
            $news_model->title = $title;
            $news_model->category_id = $category_id;
            $news_model->summary = $summary;
            $news_model->content = $content;
            $news_model->avatar = $filename;
            $is_insert = $news_model->insert();
            if ($is_insert) {
                $_SESSION['success'] = "Thêm mới tin tức thành công";
            }
            else{
                $_SESSION['error'] = "Thêm mới tin tức thất bại";
            }
            header('location: index.php?controller=news&action=index');
        }
        $category_model = new Category();
        $categories = $category_model->getAll();
            $this->content = $this->render('views/news/create.php', [
                'categories' => $categories
            ]);
            require_once 'views/layouts/main.php';
        }

        public function detail(){
            $id = $_GET['id'];
            $news_model = new News();
            if (isset($_POST['submit'])){
                $title = $_POST['title'];
                $summary = $_POST['summary'];
                $content = $_POST['content'];
                if (empty($title) || empty($content)) {
                    $this->error = "Title hoặc nội dung không được để trống";
                } else if ($_FILES['avatar']['error'] == 0) {
                    //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                    if (!in_array($extension, $arr_extension)) {
                        $this->error = 'Cần upload file định dạng ảnh';
                    }
                }
                if (empty($this->error)) {
                    $filename = '';
                    //xử lý upload file nếu có
                    if ($_FILES['avatar']['error'] == 0) {
                        $dir_uploads = __DIR__ . '/../assets/uploads';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                        $filename = time() . '-news-' . $_FILES['avatar']['name'];
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                    }
                }
                $news_model = new News();
                $news_model->title = $title;
                $news_model->summary = $summary;
                $news_model->content = $content;
                $news_model->avatar = $filename;
                $news_model->update_at = date('Y-m-d H:i:s');
                $is_update = $news_model->update($id);
                if ($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                    header('location: index.php?controller=news&action=index');
                    exit();
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                    header('location: index.php?controller=news&action=index');
                    exit();
                }
            }
            $new = $news_model->getById($id);
            $this->content = $this->render('views/news/detail.php',[
                'new' => $new
            ]);
            require_once 'views/layouts/main.php';
        }
        public function delete(){
            $id = $_GET['id'];
            $model_news = new News();
            $is_delete = $model_news->delete($id);
            if ($is_delete){
                $_SESSION['success'] = "Xóa thành công";
                header('location: index.php?controller=news&action=index');
                exit();
            }
            else{
                $_SESSION['error'] = "Xóa thất bại";
                header('location: index.php?controller=news&action=index');
                exit();
            }
        }
        public function homedetail(){
            $id = $_GET['id'];
            $model_news = new News();
            $new = $model_news->getById($id);
            $this->content = $this->render('views/news/home_detail.php',[
                'new' => $new
            ]);
            require_once 'views/layouts/home_main.php';
        }
}