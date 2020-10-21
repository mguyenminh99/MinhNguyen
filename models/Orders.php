<?php
require_once 'models/Model.php';
class Orders extends Model
{
    public $id;
    public $user_id;
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;
    public $create_at;
    public $update_at;

    public function getAll()
    {
        $obj_getall = $this->connection->prepare("Select * from orders");
        $obj_getall->execute();
        $orders = $obj_getall->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function update($id)
    {
        $obj_update = $this->connection->prepare
        ("update orders set 
      fullname = :fullname, address = :address, mobile = :mobile, email = :email, note = :note, payment_status = :payment_status, updated_at= :updated_at where id = $id");
        $arr = [
            ':fullname' => $this->fullname,
            ':address' => $this->address,
            ':mobile' => $this->mobile,
            ':email' => $this->email,
            ':note' => $this->note,
            ':payment_status' => $this->payment_status,
            ':updated_at' => $this->update_at
        ];
        return $obj_update->execute($arr);
    }
    public function getOdersbyId($id){
        $obj_getId = $this->connection->prepare("select * from orders where id = $id");
        $obj_getId->execute();
        $order = $obj_getId->fetch(PDO::FETCH_ASSOC);
        return $order;
    }
    public function getOrderDetail($id){
        $obj_select = $this->connection->prepare("select orders.*, order_details.product_id, order_details.quantity, products.title, products.price, products.avatar FROM orders, order_details, products WHERE orders.id = order_details.order_id AND order_details.product_id = products.id AND orders.id = $id;");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrderByUserId($id){
        $obj_select = $this->connection->prepare("select * from orders where user_id = $id");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(){
        $obj_insert = $this->connection->prepare("insert into orders (fullname, user_id, address, mobile, email, note, price_total, payment_status) 
values (:fullname, :user_id, :address, :mobile, :email, :note, :price_total, :payment_status)");
        $arr = [
            ':fullname' => $this->fullname,
            ':user_id' => $this->user_id,
            ':address' => $this->address,
            ':mobile' => $this->mobile,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_status' => $this->payment_status
        ];
        // do cần trả về id của order vừa insert, nên execute sẽ không ccần gán biến
        $obj_insert->execute($arr);
        // xử lý để lấy ra id của order vừa insert
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
    public function delete($id){
        $obj_delete = $this->connection->prepare("delete from orders where id = $id");
        return $obj_delete->execute();
    }
}