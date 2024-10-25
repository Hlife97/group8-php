<?php

session_start();

function print_r_correctly($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function checkUserIsLoggedIn(){
    if(isset($_SESSION["user"])){
        header("Location: admin.php");
    }
}

function uploadFile($file){
    if(!is_dir('uploads')){
        mkdir('uploads');
    }

    $target_dir = "uploads/";

    $target_file = $target_dir . basename($file["name"]);

    if(file_exists($file['name'])){
        echo "Sorry, file already exists.";
        return false;
    };

    move_uploaded_file($file["tmp_name"], $target_file);

    echo $target_file . " Ugurla yuklendi";
}
