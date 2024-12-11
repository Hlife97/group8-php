<?php
namespace App\Controllers;
use App\Model\User;
use Core\Helper;

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once Helper::getViewFile('login');
            return;
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $user = User::getUserByEmail($email);

        if (!$user) {
            error_log("Login attempt failed for non-existing user: $email");
            echo "Invalid email or password.";
            return;
        }

        if (!password_verify($password, $user['password'])) {
            error_log("Login attempt failed for user: $email");
            echo "Invalid email or password.";
            return;
        }

        $_SESSION['user'] = $user;

        exit();
    }

    public function register()
    {
        require_once Helper::getViewFile('register');

        if(isset($_SESSION['user'])){
            echo "You already logged in.";
            return;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = User::create($name, $email, $password);

            if(!$user){
                echo "XETA";
                exit();
            }
            exit();
        }

    }

    public function logout(){
        $_SESSION['user'] = null;
        session_destroy();
        echo "You have been logged out.";
    }
}