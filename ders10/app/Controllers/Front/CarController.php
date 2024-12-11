<?php

namespace App\Controllers\Front;

use Core\Helper;

class CarController
{
    public function index()
    {
        require_once Helper::getViewFile('cars');
    }
}