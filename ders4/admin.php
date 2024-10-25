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
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
</header>

<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: login.php');
}

$username = $_SESSION['user'] ?? '';

echo "<h1>Welcome $username</h1>";

?>

<form action="logout.php" method="POST">
    <button>Logout</button>
</form>
</body>
</html>