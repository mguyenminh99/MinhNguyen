<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10/1/2020
 * Time: 5:42 PM
 */
require_once 'models/Model.php';
class Contact extends Model
{
    public $name;
    public $subject;
    public $email;
    public $message;

    public function insert(){
        $obj_insert = $this->connection->prepare("insert into contact (`name`, `email` , subject, message) values (:name , :email, :subject, :message)");
        $arr = [
            ':name' => $this->name,
            ':email' =>$this->email,
            ':subject' => $this->subject,
            ':message' => $this->message
        ];
        return $obj_insert->execute($arr);
    }
}