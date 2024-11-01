<?php

namespace Core;
use App\Controllers\Front\AboutController;
use App\Controllers\Front\HomeController;

class Route
{
    private array $routes = array();

    public static function get($uri, $method)
    {
//        if(gettype($method) === "string"){
//            $res = Helper::explodeController($method);
//            require_once '../app/Controllers/Front/' . $res[0] . '.php';
//            $controller = $res[0];
//
//            var_dump($controller);
////            var_dump($controller);
////            $method = $res[1];
////            $controller->$method($uri);
//        }
    }
}