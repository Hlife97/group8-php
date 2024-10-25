<?php
include 'helpers.php';

//checkUserIsLoggedIn();
?>

<form method="POST" action="login.php" enctype="multipart/form-data">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="file" name="file">
    <input type="submit" value="Göndər">
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["user"] = $username;

    $file = $_FILES['file'];

    print_r_correctly($file);

    uploadFile($file);

//    checkUserIsLoggedIn();
}

?>
