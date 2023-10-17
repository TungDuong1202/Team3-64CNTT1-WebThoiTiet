<?php
    session_start();
    unset($_SESSION['role']);
    unset($_SESSION['id']);
    header("location: ../view/home.php");
    exit;
?>