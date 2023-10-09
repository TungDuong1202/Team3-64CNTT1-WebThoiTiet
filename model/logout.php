<?php
    session_start();
    unset($_SESSION['role']);
    header("location: ../view/home.php");
    exit;
?>