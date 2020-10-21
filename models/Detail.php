<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/10/2020
 * Time: 5:08 AM
 */
require_once 'models/Model.php';
class Detail extends Model
{
    public function countOrder(){
        $obj_count = $this->connection->prepare("select count(id) as number from orders");
        $obj_count->execute();
        return $obj_count->fetch(PDO::FETCH_ASSOC);
    }
    public function dayIncome($day){
        $obj_select = $this->connection->prepare("select sum(price_total) as dayIncome from orders where created_at like '%$day%'");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function monthIncome(){
        $obj_select = $this->connection->prepare("Select month(created_at) as 'month', Sum(price_total) as 'income' From orders Group by month(created_at) ");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
}