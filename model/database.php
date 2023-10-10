<?php
$host = "localhost";
$dbname = "user";
$username = "root";
$password = "";
$connn = new mysqli(hostname: $host,
                    username: $username,
                    password: $password);
$sql = "CREATE DATABASE if not exists $dbname";
$connn->query($sql);
$conn = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);
if($conn->connect_error){
    die("Connection error: ". $conn->connect_error);
}
if ($conn->query($sql) === TRUE) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL,
        role BIT DEFAULT 0,
        password VARCHAR(50) NOT NULL
    )";
    // Thực thi câu lệnh SQL
    $conn->query($sql);
    if ($conn->query($sql) === false) {
        die ("Error creating table: " . $conn->error);
    }
 }else{
    die ("Error creating database: " . $conn->error);
    }
?>