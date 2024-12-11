<?php

namespace App\Controllers\Front;

use App\Model\User;
use Core\Helper;

class UserController
{
    public function profile()
    {
        $user = User::getUserById($_SESSION['user']['id']);
        require_once Helper::getViewFile('profile');
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user']['id'];
            $user = User::getUserById($userId);
            $name = $_POST['name'];
            $email = $_POST['email'];

            User::update($userId, $name, $email);

            return;
        }
    }
}