<?php
    $jsonString = file_get_contents('data/led.json');
    $data = json_decode($jsonString,true);
    $devices = array("30","31","32","33","34","35","36","37","38","39");
    function toggle($pin){
        if ($data[$devices[$pin]] == "0") {
            $data[$devices[$pin]] = "1";
        }elseif ($data[$devices[$pin]] == "1") {
            $data[$devices[$pin]] = "0";
        }
    }
    for ($i=0; $i < 10; $i++) {
        toggle(i)
    }

    $newJsonString = json_encode($data);
    file_put_contents('data/led.json',$newJsonString);
?>