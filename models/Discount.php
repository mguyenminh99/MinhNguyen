<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/30/2020
 * Time: 7:17 PM
 */
require_once 'models/Model.php';
class Discount extends Model
{
    public $key_word;
    public $discount_num;
    public $begin_sale;
    public $end_sale;

    public function getDiscount($key_word){
        $obj_select = $this->connection->prepare("select * from discount where key_word like '$key_word'");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $obj_select = $this->connection->prepare("select * from discount order by id desc ");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create(){
        $obj_insert = $this->connection->prepare("insert into discount (key_word, discount_num, begin_sale, end_sale) values (:key_word, :discount_num, :begin_sale, :end_sale)");
        $arr = [
            ':key_word' => $this->key_word,
            ':discount_num' => $this->discount_num,
            ':begin_sale' => $this->begin_sale,
            ':end_sale' => $this->end_sale
        ];
        return $obj_insert->execute($arr);
    }
    public function getById($id){
        $obj_select = $this->connection->prepare("select * from discount where id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id){
        $obj_update = $this->connection->prepare("update discount set key_word=:key_word, discount_num=:discount_num, begin_sale=:begin_sale, end_sale=:end_sale where id = $id");
        $arr = [
            ':key_word' => $this->key_word,
            ':discount_num' => $this->discount_num,
            ':begin_sale' => $this->begin_sale,
            ':end_sale' => $this->end_sale
        ];
        return $obj_update->execute($arr);
    }
}