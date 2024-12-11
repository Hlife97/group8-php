<?php

namespace App\Controllers\Front;

use Core\Helper;

class BlogController
{
    public function index()
    {
        require_once Helper::getViewFile('blogs');
    }
}