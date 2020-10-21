<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2020
 * Time: 7:51 PM
 */
require_once 'models/Model.php';
class News extends Model
{
    public $category_id;
    public $title;
    public $summary;
    public $avatar;
    public $content;
    public $status;
    public $create_at;
    public $update_at;

    public function getLatest(){
        $obj_select = $this->connection->prepare("SELECT * FROM news order by id DESC LIMIT 3 ");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $obj_select = $this->connection->prepare("select * from news order by id desc ");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(){
        $obj_insert = $this->connection->prepare("insert into news (category_id, title, summary, avatar, content) values(:category_id, :title, :summary, :avatar, :content)");
        $arr = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content
        ];
        return $obj_insert->execute($arr);
    }
    public function getById($id){
        $obj_select = $this->connection->prepare("select * from news where id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);

    }
    public function update($id){
        $obj_update = $this->connection->prepare("update news set title=:title, summary=:summary, avatar=:avatar, content=:content, updated_at=:updated_at where id = $id");
        $arr = [
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':updated_at' => $this->update_at
        ];
        return $obj_update->execute($arr);
    }
    public function delete($id){
        $obj_delete = $this->connection->prepare("delete from news where id = $id");
        return $obj_delete->execute();
    }
}