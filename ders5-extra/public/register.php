<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="register.php" method="POST">
    <input type="text" placeholder="username" name="username">
    <input type="email" placeholder="email" name="email">
    <input type="password" placeholder="password" name="password">

    <button type="submit">Register</button>
</form>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    if(empty($username) || empty($email) || empty($password)){
        trigger_error("All inputs are required", E_USER_ERROR);
    }

    $users = $_COOKIE['users'] ? json_decode($_COOKIE['users'],true) : [];
    // Eyer Cookiede basqa userler varsa onu birinci gotur // 3 user

    $users[] = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    setcookie("users", json_encode($users), time() + 3600, "/");

    header("Location: login.php");
}

?>

</body>
</html>