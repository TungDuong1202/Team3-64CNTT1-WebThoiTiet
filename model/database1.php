<?php
$host = "localhost";
$dbname = "user";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Câu lệnh SQL để tạo cơ sở dữ liệu mới
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($sqlCreateDB);

    // Chọn cơ sở dữ liệu mới để sử dụng
    $conn->exec("USE $dbname");

    // Câu lệnh SQL để tạo bảng mới
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
        id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(100) NOT NULL,
        `password` VARCHAR(50) NOT NULL,
        `role` BIT DEFAULT 0
    )";
    $conn->exec($sqlCreateTable);
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}

?>