<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "homeautomation";
    
    $connection = mysqli_connect($host, $username, $password, $database);
    
    if(mysqli_connect_error()){
        echo 'Database Connection Error!';
    }
?>

