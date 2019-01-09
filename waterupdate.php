<?php
            include ("config/config.php");
            $val = $_POST['msg'];
            $sql = "Update water set value='$val' where name='water'";
            if (mysqli_query($connection, $sql)) {
                echo "Success";
            } else {
                echo "Error" ;
            }
            mysqli_close($connection);
            header('location:water.php');
?>
