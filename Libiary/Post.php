<?php

namespace Libiary;

use PDO;

class Post extends DB
{
    public static function  all($sql)
    {
        $db = new DB();
        $conn = $db->pdo;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function store($request)
    {
        $name = $request['name'];
        $slug = uniqid() . $name;
        $sql  = "insert into categories (slug,name) values ('$slug','$name')";
        $db = new DB();
        $stmt = $db->pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function update($request)
    {
        $name = $request['name'];
        $id = $request['id'];

        $sql  = "update categories set name='$name' where id=$id";
        $db = new DB();
        $stmt = $db->pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function show($id)
    {
        $db = new DB();
        $conn = $db->pdo;
        $stmt = $conn->prepare("select * from categories where id=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function one()
    {
    }

    public function delete($id)
    {
        $sql  = "delete from categories where id=$id";
        $db = new DB();
        $stmt = $db->pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
