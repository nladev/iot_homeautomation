<?php
include ("config/config.php");

$result = $connection->query('Select huma from sensor ORDER BY id DESC LIMIT 1');
if($data = $result->fetch_array()){

echo 'Humidity '.$data['huma'].'%';
}
?>
