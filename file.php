<?php
    // session_start();
    // if($_SESSION['access'] != "true"){
    //     header('location:index.html');
    // }
    $dir = 'C:/xampp/htdocs/iot/log/'; //directory to pull from
    $skip = array('.','..'); //a few directories to ignore

    $dp = opendir($dir); //open a connection to the directory
    $files = array();

    if ($dp) {
        while ($file = readdir($dp)) {
            if (in_array($file, $skip)) continue;

            if (is_dir("$dir$file")) {
                $innerdp = opendir("$dir$file");

                if ($innerdp) {
                    while ($innerfile = readdir($innerdp)) {
                        if (in_array($innerfile, $skip)) continue;

                        $arr = explode('.', $innerfile);
                        if (strtolower($arr[count($arr) - 1]) == 'csv') {
                            $files[$file][] = $innerfile;
                        }
                    }
                }
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Home Automation">
    <meta name="author" content="Nay Lin Aung">
    <link rel="icon" href="img/wireless.png">

    <title>Home Automation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootbox.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
           <script src="js/datatablej.js"></script>
           <script src="js/datatableb.js"></script>
           <link rel="stylesheet" href="css/datatable.css" />

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
                <li class="active"><a href="history.php">History</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
                <h3>Sensor History</h3>
                <br>
                <div class="table-responsive">
            <table class="table table-hover table-striped" id="sensor_data" width="100%">
                <thead>
          <tr>
                <th>Sensor Data List</th>
                <th>Download</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php while($data = $result->fetch_array()) {
              echo '<tr>';
              echo '<td>'. $inner_files .'</td>';
              echo '</tr>';
           }?>
            </tbody>
            </table>

    </div> <!-- /container -->
  </body>
</html>
