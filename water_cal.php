<?php
            include ("config/config.php");
            $high = 0;
            $res = $connection->query("Select value from water where name='water'");
            if($datah = $res->fetch_array()){
                $high = $datah['value'];
            }
            $result = $connection->query('Select water from sensor ORDER BY id DESC LIMIT 1');
            if($data = $result->fetch_array()){

            $val = $data['water'];
            $water = (($high-$val)/$high)*100.0;
            echo $water.'%';
        }
            ?>
