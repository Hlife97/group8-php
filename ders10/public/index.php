<?php

declare(strict_types=1);
session_start();
require_once "../vendor/autoload.php";

use App\Controllers\Front\HomeController;
use App\Controllers\Front\AboutController;
use App\Controllers\Front\ContactController;
use App\Controllers\Front\CarController;
use App\Controllers\Front\BlogController;
use App\Controllers\Front\UserController;
use App\Controllers\AuthController;

//Admin Controllers
use App\Controllers\Admin\CarController as AdminCarController;

use Core\Database;
//use Core\Route;
//use App\Model\User;
//use App\Model\Car;

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

//echo "hi";

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

error_reporting(E_ALL);
ini_set('display_errors', 1);

switch ($request) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/about':
        $controller = new AboutController();
        $controller->index();
        break;
    case '/cars':
        $controller = new CarController();
        $controller->index();
        break;
    case '/blogs':
        $controller = new BlogController();
        $controller->index();
        break;
    case '/contact':
        $controller = new ContactController();
        $controller->index();
        break;
    case '/register':
        $controller = new AuthController();
        $controller->register();
        break;
    case '/login':
        $controller = new AuthController();
        $controller->login();
        break;
    case '/profile':
        $controller = new UserController();
        $controller->profile();
        break;
    case '/updateUser':
        $controller = new UserController();
        $controller->update();
        break;
    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case '/admin/cars':
        $controller = new AdminCarController();
        $controller->index();
        break;
    case '/admin/cars/create':
        $controller = new AdminCarController();
        $controller->create();
        break;
    case '/admin':
        break;
    default:
        echo "404 Not Found";
}