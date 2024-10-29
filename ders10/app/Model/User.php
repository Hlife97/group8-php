<?php

namespace App\Model;

class User
{
    public static function getUserById($id){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function create($name, $email, $password){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public static function update($id, $name, $email, $password){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $id]);
    }

    public static function delete($id){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllUsers(){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}