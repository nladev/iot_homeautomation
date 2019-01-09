<?php
    include 'config/config.php';
    $b1 = $_GET ['bed_room_1'];
    $b2 = $_GET ['bed_room_2'];
    $l = $_GET ['living_room'];
    $d = $_GET ['dining_room'];

    $sql_update = "UPDATE door SET status=? WHERE name=?";
    $stmt = $connection->prepare($sql_update);

    $stmt->bind_param('ds',$status,$name);

    $name = "bed_room_1";
    $status = $b1;
    $stmt->execute();
    

    $name = "bed_room_2";
    $status = $b2;
    $stmt->execute();

    $name = "living_room";
    $status = $l;
    $stmt->execute();

    $name = "dining_room";
    $status = $d;
    $stmt->execute();

    $stmt->close();
    $connection->close();
?>