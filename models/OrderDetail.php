<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
  public $order_id;
  public $product_id;
  public $quantity;

  public function insert(){
      $obj_insert = $this->connection->prepare("insert into order_details (order_id, product_id, quantity) values (:order_id, :product_id, :quantity)");
      $arr = [
          ':order_id' => $this->order_id,
          ':product_id' => $this->product_id,
          ':quantity' => $this->quantity
      ];
      return $obj_insert->execute($arr);
  }
}