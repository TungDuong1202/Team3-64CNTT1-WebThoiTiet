<?php
    require "../model/database.php";
?>
<?php
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    }
?>
<?php
    $connection = mysqli_connect("$host", "$username", "$password", "$dbname");
    $sql = "DELETE FROM users WHERE id = $id";
    $qr = mysqli_query($conn,$sql);
    header("Location: quan_ly_db.php");
?>