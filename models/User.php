<?php
require_once 'models/Model.php';
class User extends Model {
    //khai báo các thuộc tính cho model chính là
    //các trường của bảng tương ứng
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $address;
    public $phone;
    public $avatar;
    public $jobs;
    public $last_login;
    public $create_at;
    public $update_at;
    public $role;
    public $str_search;

    public function __construct() {
        parent::__construct();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = addslashes($_GET['username']);
            $this->str_search .= " AND users.username LIKE '%$username%'";
        }
    }

    //kiểm tra username đã tồn tại trong bảng users hay chưa
    public function isUsernameExists($username) {
        // + Viết câu truy vấn
        $sql_select_one = "SELECT * FROM 
        users WHERE username=:username";
        // + tạo đối tượng truy vấn, prepare
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        // + Tạo mảng để gán giá trị thật cho tham số trong
        //câu truy vấn
        $arr_select = [
          ':username' => $username
        ];
        // + Thực thi đối tượng truy vấn, execute
        $obj_select_one->execute($arr_select);
        // + Lấy ra đối tượng user dưới dạng mảng,
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        //nếu tồn tại user thì sẽ trả về true
        if (!empty($user)) {
            return TRUE;
        }
        return FALSE;
    }

    //phương thức đăng ký user
    public function register($username, $password, $email) {
        // + Tạo câu truy vấn dạng tham số
        $sql_insert = "INSERT INTO users(username, password, email)
        VALUES (:username, :password, :email)";
        // + Tạo đối tượng truy vấn, prepare
        $obj_insert = $this->connection->prepare($sql_insert);
        // + Tạo mảng để gán dữ liệu thật cho tham số
        // câu truy vấn
        $arr_insert = [
          ':username' => $username,
          ':password' => $password,
            ':email' => $email
        ];
        // + Thực thi truy vấn, execute
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }

    //phương thức lấy user theo username và password
    public function getUser($username, $password) {
        // + Tạo câu truy vấn
        $sql_select_one =
        "SELECT * FROM users 
        WHERE username=:username AND password=:password";
        //+ Tạo đối tượng truy vấn
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        // + Tạo mảng để truyền giá trị cho câu truy vấn
        $arr_select = [
          ':username' => $username,
          ':password' => $password
        ];
        // + Thực thi đối tượng truy vấn
        $obj_select_one->execute($arr_select);
        // + Lấy ra mảng user
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function update($id){
        $obj_update = $this->connection->prepare("update users set first_name=:first_name,last_name=:last_name,address=:address,email=:email,phone=:phone,avatar=:avatar,jobs=:jobs where id=$id");
        $arr_update = [
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':address' => $this->address,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':jobs' => $this->jobs
        ];
        return $obj_update->execute($arr_update);
    }
    public function getAllPagination($params = []) {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $this->str_search
              ORDER BY created_at DESC
              LIMIT $start, $limit");

        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
    public function getById($id){
        $obj_select = $this->connection->prepare("select * from users where id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $obj_select = $this->connection->prepare("select * from users");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function isCorectPassword($password,$id){
        $obj_select = $this->connection->prepare("select * from users where password = :password and id = :id");
        $arr = [
            ':password' => $password,
            ':id' => $id
        ];
        $obj_select->execute($arr);
        return $obj_select->fetch();
    }
    public function changePassword($id){
        $obj_update = $this->connection->prepare("update users set password = :password where id =:id");
        $arr = [':password' => $this->password,':id' => $id];
        return $obj_update->execute($arr);
    }
}