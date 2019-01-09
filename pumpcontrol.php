<?php
$updatestate = $_GET["state"];
$devicenumber=$_GET["number"];
$xml=simplexml_load_file("relaycontrol.xml") or die("Error:Cannot create object");
if($updatestate=="ON")
$xml->device[(int)$devicenumber]->state="ON";
else
$xml->device[(int)$devicenumber]->state="OFF";
$xml->asXML("relaycontrol.xml");
header("Location: water.php");
?>
