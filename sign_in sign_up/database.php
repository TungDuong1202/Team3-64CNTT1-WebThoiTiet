<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($host, $username, $password, $dbname);
$connection = mysqli_connect("$host", "$username", "$password", "$dbname");
if($conn->connect_error){
    die("Connection error: ". $conn->connect_error);
}
return $conn;
?>