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
    public static function create($name, $email, $password) {
        global $db;

        try {
            $stmt = $db->getConnectionInstance()->prepare("
            INSERT INTO users (name, email, password, created_at, updated_at) 
            VALUES (:name, :email, :password, NOW(), NOW())
        ");

            return $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return $e->getMessage();
        }
    }

    public static function update($id, $name, $email){
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
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

    public static function getUserByEmail($email)
    {
        global $db;
        $stmt = $db->getConnectionInstance()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}