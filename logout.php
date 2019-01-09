<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['access']);
    header("location:index.html");
?>

