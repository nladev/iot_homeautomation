<?php
    include 'config/config.php';
    $temp = $_GET ['temperature'];
    $huma = $_GET ['humidity'];
    $light = $_GET ['light'];
    $flame = $_GET ['flame'];
    $motion = $_GET ['motion'];
    $water = $_GET ['water'];

    $sql_insert = "insert into sensor (temp ,huma , light, flame, motion, water) values('$temp','$huma','$light','$flame','$motion','$water')";

if (mysqli_query($connection, $sql_insert)) {
    echo "success";
} else {
    echo "Error " ;
}
$connection->close();
?>
