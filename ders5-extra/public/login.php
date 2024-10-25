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
<form action="login.php" method="POST">
    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="password">

    <button type="submit">Log in</button>
</form>

<?php
//
//session_start();
//
//$users = json_decode($_COOKIE["users"], true);
//
//echo "<pre>";
//print_r($users);
//echo "</pre>";
//
//if($_SERVER["REQUEST_METHOD"] == "POST"){
//
//    foreach ($users as $user) {
//        if($user["username"] === $_POST["username"]){
//            if(password_verify($_POST["password"], $user["password"])){
//                $_SESSION['username'] = $user["username"];
//                header("Location: admin.php");
//            }
//        }else{
//           trigger_error('User not found', E_USER_ERROR);
//        }
//    }
//}
//
//print_r($_SESSION['username'] ?? 'NULL');


session_start();

$users = json_decode($_COOKIE["users"], true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $userFound = false;

    foreach ($users as $user) {
        if ($user["username"] === $username) {
            $userFound = true;
            if (password_verify($password, $user["password"])) {
                $_SESSION['username'] = $user["username"];
                header("Location: admin.php");
                exit; // Prevent further execution
            }
            break; // Exit loop if user found
        }
    }

    if (!$userFound) {
        trigger_error('User not found', E_USER_ERROR);
    } else {
        trigger_error('Invalid password', E_USER_ERROR);
    }
}

echo "<pre>";
print_r($_SESSION['username'] ?? 'NULL');
echo "</pre>";

?>
</body>
</html>