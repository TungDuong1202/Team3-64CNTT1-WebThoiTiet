<?php
    require "../sign_in sign_up/database.php"
?>
<?php
    if(isset($_GET["id"])){
    $id = $_GET["id"];
    }
?>
<?php
    $sql = "DELETE FROM users WHERE id = $id";
    $qr = mysqli_query($connection,$sql);
    header("Location: quan_ly_db.php");
?>