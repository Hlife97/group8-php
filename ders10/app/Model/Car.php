<?php

namespace App\Model;

class Car
{
    public static function getCarById($id){
        global $db;
        $SQL = "SELECT * FROM cars WHERE id = ?";
        $stmt = $db->getConnectionInstance()->prepare($SQL);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function create($make, $model, $year, $price_per_day, $availability){
        global $db;
        $SQL = "INSERT INTO cars (make, model, year, price_per_day, availability) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->getConnectionInstance()->prepare($SQL);
        return $stmt->execute([$make, $model, $year, $price_per_day, $availability]);
    }

    public static function update($id, $make, $model, $year, $price_per_day, $availability){
        global $db;
        $SQL = "UPDATE cars SET make = ?, model = ?, year = ?, price_per_day = ?, availability = ? WHERE id = ?";
        $stmt = $db->getConnectionInstance()->prepare($SQL);
        return $stmt->execute([$make, $model, $year, $price_per_day, $availability, $id]);
    }

    public static function delete($id){
        global $db;
        $SQL = "DELETE FROM cars WHERE id = ?";
        $stmt = $db->getConnectionInstance()->prepare($SQL);
        return $stmt->execute([$id]);
    }

    public static function getAllCars(){
        global $db;
        $SQL ="SELECT * FROM cars";
        $stmt = $db->getConnectionInstance()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}