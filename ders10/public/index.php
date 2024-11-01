<?php

declare(strict_types=1);
session_start();
require_once "../vendor/autoload.php";

//use Core\Database;
//use App\Model\User;
//use App\Model\Car;

//$config = require_once "../config/config.php";

//$db = new Database($config['db']);


//$user = User::create('Melek', 'melek@gmail.com' ,'123456');
//$user = User::update(1, "Fazil", "fazil@gmail.com", "87654321");
//$user = User::delete(1);
//$user = User::getUserById(2);
//$users = User::getAllUsers();

//echo "<pre>";
//print_r($users);

//$car = Car::create('BMW sirketi', "BMW 245", "2020", "100", 1);
//var_dump($car);

//echo "hi";

use App\Controllers\Front\HomeController;
use App\Controllers\Front\AboutController;
use Core\Route;

$request = $_SERVER['REQUEST_URI'];

//echo "<pre>";
//print_r($request);

//switch ($request) {
//    case '/':
//        $controller = new HomeController();
//        $controller->index();
//        break;
//}

//Route::get('/about', 'HomeController@index');

switch ($request) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/about':
        $controller = new AboutController();
        $controller->index();
        break;
    default:
        echo "404 Not Found";
}