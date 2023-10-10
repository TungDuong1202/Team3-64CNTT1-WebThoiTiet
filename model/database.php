<?php
$host = "localhost";
$dbname = "user";
$username = "root";
$password = "";

$conn = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);
if($conn->connect_error){
    die("Connection error: ". $conn->connect_error);
}
if ($conn->select_db($dbname) === false) {
    // Nếu không tồn tại, tạo mới cơ sở dữ liệu
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(20) NOT NULL,
            email VARCHAR(100) NOT NULL,
            role BIT DEFAULT 0,
            password VARCHAR(50) NOT NULL
        )";
        // Thực thi câu lệnh SQL
        if ($conn->query($sql) === false) {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Error creating database: " . $conn->error;
    }
}
?>