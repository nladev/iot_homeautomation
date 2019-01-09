<?php
    session_start();
    if($_SESSION['access'] != "true"){
        header('location:index.html');
    }
        $xml=simplexml_load_file("relaycontrol.xml") or die("Error:Cannot create object");
        $waterState="";
        $waterState= $xml->device[8]->state;
        $xml->asXML("relaycontrol.xml");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Home Automation Control">
    <meta name="author" content="Nay Lin Aung">
    <link rel="icon" href="img/wireless.png">

    <title>Home Automation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/window.css" rel="stylesheet" type="text/css"/>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootbox.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

    <body>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">HOME AUTOMATION</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="control.php">Home</a></li>
                <li><a href="relay.php">Light Control</a></li>
                <li><a href="water.php">Water Level</a></li>
                <li class="active"><a href="window.php">Windows</a></li>
                <li><a href="history.php">History</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
      <?php
          include "config/config.php";
          $sql = "Select status from door";
          $result = $connection->query($sql);
          $arr = Array();
          while($row = $result->fetch_array()){
            $arr[] = $row['status'];
          }
          $bed_room_1 = $arr[0];
          $bed_room_2 = $arr[1];
          $living_room= $arr[2];
          $dining_room= $arr[3];
        ?>
      <div class="row">
        <div class="col-sm-6">
            <div id="aa">
            <img src="<?php
              if($bed_room_1==0){
                echo "img/open-window.png";
              }else{
                echo "img/closed-window.png";
              }
            ?>" class="rounded" alt="close">
            <div class="latter">
              Bed Room 1
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="bb">
            <img src="<?php
              if($bed_room_2==0){
                echo "img/open-window.png";
              }else{
                echo "img/closed-window.png";
              }
            ?>" class="rounded" alt="close">
            <div class="latter">
              Bed Room2
            </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
            <div id="cc">
            <img src="<?php
              if($living_room==0){
                echo "img/open-window.png";
              }else{
                echo "img/closed-window.png";
              }
            ?>" class="rounded" alt="close">
            <div class="latter">
              Living Room
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="dd">
            <img src="<?php
              if($dining_room==0){
                echo "img/open-window.png";
              }else{
                echo "img/closed-window.png";
              }
            ?> " class="rounded" alt="close">
            <div class="latter">
              Dining Room
            </div>
            </div>
        </div>
      </div>
      </div>
      <script>
        // $(document).ready(function(){
        //     setInterval(function() {
        //         $("#aa").load("window.php");
        //         $("#bb").load("window.php");
        //         $("#cc").load("window.php");
        //         $("#dd").load("window.php");
        //     }, 1000);
        // });
      </script>
  </body>
</html>