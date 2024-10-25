<?php

declare(strict_types=1);

include '../vendor/autoload.php';

// mysqli sadece mysql database ucun nezerde tutulmus connecton novudur.
// PDO bu ise hem MySql hemde diger databaselere connection ucun nezerde tutulub.

// csv -> test.csv -> datalari yazirsan
// mysql -> test -> users, products, cart, comments

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ders9";

$conn = new mysqli($servername, $username, $password, $dbname); // bu line

if ($conn->connect_error) {
    throw new \Exception("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully" . "<br>";

//$sql = "CREATE DATABASE ders9";

//if ($conn->query($sql) === TRUE) {
//    echo "Database created successfully" . "<br>";
//}else{
//    echo "Error creating database: " . $conn->error;
//}
//$conn->close();

//$sql = "CREATE TABLE users (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//name VARCHAR(30) NULL,
//lastname VARCHAR(30) NULL,
//email VARCHAR(50) UNIQUE,
//phone VARCHAR(30) UNIQUE,
//created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//)";
//
//if ($conn->query($sql) === TRUE) {
//    echo "Table users created successfully";
//}else{
//    echo "Error creating table: " . $conn->error;
//}

//$sql = "INSERT INTO users (name, lastname, email, phone) VALUES ('Kenan', 'M', 'kenan@gmail.com', '+994556662236')";
//
//if ($conn->query($sql) === TRUE) {
//    $last_id = $conn->insert_id;
//    echo "New record created successfully" . "Last ID: " . $last_id;
//}else{
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

//$sql = "INSERT INTO users (name, lastname, email, phone)
//VALUES ('John', 'Doe', 'john@example.com', '3412311');";
//$sql .= "INSERT INTO users (name, lastname, email, phone)
//VALUES ('Mary', 'Moe', 'mary@example.com', '34663612213');";
//$sql .= "INSERT INTO users (name, lastname, email, phone)
//VALUES ('Julie', 'Dooley', 'julie@example.com', '122132132')";
//
//if($conn->multi_query($sql) === TRUE) {
//    echo "New records created successfully";
//}else{
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

//$stmt = $conn->prepare("INSERT INTO users (name, lastname, email, phone) VALUES (?, ?, ?, ?)");
//$stmt->bind_param("ssss", $name, $lastname, $email, $phone);
//
//$name = 'Fazil';
//$lastname = "Memmedli";
//$email = "fazil@gmail.com";
//$phone = "122321312";
//$stmt->execute();
//
//$name = 'Kamil';
//$lastname = "Memmedli";
//$email = "kamil@gmail.com";
//$phone = "3243284";
//$stmt->execute();
//
//echo "New records created successfully";
//
//$stmt->close();
//$conn->close();

// 10 -> 1

$sql = "SELECT id, name, email FROM users ORDER BY id ASC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($data = $result->fetch_assoc()) {
        echo "ID: " . $data['id'] . "  Name: " . $data["name"] . " ------ Email: " . $data['email']  . "<br>";
    }
}else{
    echo "0 results";
}

$conn->close();
//
//$sql = "DELETE FROM users WHERE id = 7";
//
//if ($conn->query($sql) === TRUE) {
//    echo "Record deleted successfully" . "<br>";
//}else{
//    echo "Error deleting record: " . $conn->error;
//}

//$sql = "UPDATE users SET lastname = 'JANE' WHERE id = 6";
//if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully" . "<br>";
//}else{
//    echo "Error updating record: " . $conn->error . "<br>";
//}
//
//$conn->close();