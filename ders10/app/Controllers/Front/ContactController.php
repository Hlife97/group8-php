<?php

namespace App\Controllers\Front;


use Core\Helper;

class ContactController
{
    public function index()
    {
        require_once Helper::getViewFile('contact');
    }
}