<?php
require_once 'models/Model.php';

class Product extends Model
{

  public $id;
  public $category_id;
  public $title;
  public $avatar;
  public $price;
  public $sale;
  public $amount;
  public $summary;
  public $content;
  public $status;
  public $created_at;
  public $updated_at;

  public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }
  /**
   * Lấy thông tin của sản phẩm đang có trên hệ thống
   * @return array
   */
  public function getAll($params = [])
  {
    // tạo ra 1 chuỗi search với giá trị là where true, để việc nối chuỗi với các key search được đơn giản hơn
      $str_search = ' WHERE TRUE ';
      // xử lý nếu search thì sẽ thay đổi lại giá trị của chuỗi search ban đầu
      // hiển thị chuỗi search trên trong câu truy vấn
      if (isset($params['category_id'])&&$params['category_id'] != -1){
          $category_id = $params['category_id'];
          $str_search .= " AND products.category_id = $category_id";
      }
      if (isset($params['name'])||!empty($params['name'])){
          $name = $params['name'];
          // truy vấn like sẽ rất chậm nếu số lượng bản ghi nhiều, thực tế sẽ ít khi sử dụng like để thực hiện chức năng
          // search do không tận dụng được cơ chế index dữ liệu trong CSDL
          $str_search .= " AND products.title like '%$name%'";
      }
      if (isset($params['price'])||!empty($params['price'])){
          $price = $params['price'];
          $str_search .= " AND products.price LIKE '%$price%'";
      }
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id 
                        $str_search
                        ORDER BY products.created_at DESC
                        ");

    $arr_select = [];
    $obj_select->execute($arr_select);
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $products;
  }

  /**
   * Lấy thông tin của sản phẩm đang có trên hệ thống
   * @param array Mảng các tham số phân trang
   * @return array
   */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

  /**
   * Tính tổng số bản ghi đang có trong bảng products
   * @return mixed
   */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

  /**
   * Insert dữ liệu vào bảng products
   * @return bool
   */
  public function insert()
  {
    $obj_insert = $this->connection
      ->prepare("INSERT INTO products(category_id, title, avatar, price, sale, amount, summary, content, status) 
                                VALUES (:category_id, :title, :avatar, :price, :sale, :amount, :summary, :content, :status)");
    $arr_insert = [
      ':category_id' => $this->category_id,
      ':title' => $this->title,
      ':avatar' => $this->avatar,
      ':price' => $this->price,
        ':sale' => $this->sale,
      ':amount' => $this->amount,
      ':summary' => $this->summary,
      ':content' => $this->content,
      ':status' => $this->status,
    ];
    return $obj_insert->execute($arr_insert);
  }

  /**
   * Lấy thông tin sản phẩm theo id
   * @param $id
   * @return mixed
   */
  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

    $obj_select->execute();
    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }


  public function update($id)
  {
    $obj_update = $this->connection
      ->prepare("UPDATE products SET category_id=:category_id, title=:title, avatar=:avatar, price=:price, sale=:sale, amount=:amount, 
            summary=:summary, content=:content, status=:status, updated_at=:updated_at WHERE id = $id
");
    $arr_update = [
      ':category_id' => $this->category_id,
      ':title' => $this->title,
      ':avatar' => $this->avatar,
      ':price' => $this->price,
        ':sale' => $this->sale,
      ':amount' => $this->amount,
      ':summary' => $this->summary,
      ':content' => $this->content,
      ':status' => $this->status,
      ':updated_at' => $this->updated_at,
    ];
    return $obj_update->execute($arr_update);
  }

  public function delete($id)
  {
    $obj_delete = $this->connection
      ->prepare("DELETE FROM products WHERE id = $id");
    return $obj_delete->execute();
  }
  public function getAllbyCid($id){
      $obj_select = $this->connection->prepare("select * from products where category_id=$id");
      $obj_select->execute();
      return $obj_select->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAllbyText($text){
      $obj_select = $this->connection->prepare("select * from products where title like '%$text%'");
      $obj_select->execute();
      return $obj_select->fetchAll(PDO::FETCH_ASSOC);
  }
  public function countProducts(){
      $obj_count = $this->connection->prepare("select product_id,quantity from order_details");
      $obj_count->execute();
      return $obj_count->fetchAll(PDO::FETCH_ASSOC);
  }
}