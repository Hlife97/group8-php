<form action="admin.php" method="POST">
    <button type="submit">Logout</button>
</form>

<?php

echo "WELCOME";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $_SESSION[] = [];
    session_destroy();

    header("Location: login.php");
}

?>
