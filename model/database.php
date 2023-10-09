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
?>