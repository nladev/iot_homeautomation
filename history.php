<?php
    session_start();
    if($_SESSION['access'] != "true"){
        header('location:index.html');
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
                <li><a href="window.php">Windows</a></li>
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
                <th>id</th>
                <th>Time</th>
                <th>Temperature</th>
                <th>Humility</th>
                <th>Light</th>
                <th>Flame</th>
                <th>Motion</th>
                <th>Water</th>
          </tr>
        </thead>
        <tbody id="myTable">
                    <?php
                        include ("config/config.php");

                        $result = $connection->query('Select * from sensor');
                        while($data = $result->fetch_array()){
                            echo '<tr>';
                                echo '<td>'.$data['id'].'</td>';
                                echo '<td>'.date('d/m/Y-H:i:s',strtotime($data['date_time'])).'</td>';
                                echo '<td>'.$data['temp'].'°C</td>';
                                echo '<td>'.$data['huma'].'%</td>';
                                echo '<td>'.$data['light'].'%</td>';
                                echo '<td>'.$data['flame'].'</td>';
                                echo '<td>'.$data['motion'].'</td>';
                                echo '<td>'.$data['water'].'</td>';
                            echo '</tr>';
                        }
                    ?>
            </tbody>
            </table>
            </div>
            <script type="text/javascript">
            $(document).ready(function(){
                  $('#sensor_data').DataTable();
             });
              //Logs
            // $(document).ready(function(){setInterval(function(){Timer()},1000)});
            //
            //   function Timer()
            //   {
            //   var d=new Date();
            //   var today = new Date();
            //   var dd = today.getDate();
            //   var mm = today.getMonth()+1; //January is 0!
            //   var yyyy = today.getFullYear();
            // 
            //   if(dd<10) {
            //       dd = '0'+dd
            //   }
            //
            //   if(mm<10) {
            //       mm = '0'+mm
            //   }
            //
            //   today = mm + '/' + dd + '/' + yyyy;
            //   var t=d.toLocaleTimeString();
            //       if(t == "9:43:00 PM"){
            //           $.ajax({
            //             type: "POST",
            //             url: "log.php",
            //             data: {dateExport: today},
            //           });
            //       };
            //   };
            </script>
    </div> <!-- /container -->
  </body>
</html>
