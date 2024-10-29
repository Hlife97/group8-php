<?php

declare(strict_types=1);

use Core\Database;
use App\Model\User;
use App\Model\Car;

require_once "../vendor/autoload.php";

$config = require_once "../config/config.php";

$db = new Database($config['db']);


//$user = User::create('Melek', 'melek@gmail.com' ,'123456');
//$user = User::update(1, "Fazil", "fazil@gmail.com", "87654321");
//$user = User::delete(1);
//$user = User::getUserById(2);
//$users = User::getAllUsers();

//echo "<pre>";
//print_r($users);

//$car = Car::create('BMW sirketi', "BMW 245", "2020", "100", 1);
//var_dump($car);