<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/25/2020
 * Time: 5:00 PM
 */
require_once 'models/Model.php';
class Feedback extends Model
{
    public $product_id;
    public $user_id;
    public $star;
    public $comment;

    public function addFeedback(){
        $obj_insert = $this->connection->prepare("INSERT INTO feedback (product_id, user_id, star, comment) values (:product_id, :user_id, :star, :comment)");
        $arr = [
            ':product_id' => $this->product_id,
            ':user_id' => $this->user_id,
            ':star' => $this->star,
            ':comment' => $this->comment
        ];
        return $obj_insert->execute($arr);
    }
    public function getFeedback($id){
        $obj_select = $this->connection->prepare("select users.avatar, users.username, feedback.*  from users,feedback WHERE users.id = feedback.user_id and feedback.product_id = $id;");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function check($id,$user_id){
        $obj_select = $this->connection->prepare("select * from feedback where product_id = $id and user_id = $user_id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
}
}