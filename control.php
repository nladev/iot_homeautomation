
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Home Automation Control">
    <meta name="author" content="Nay Lin Aung">
    <link rel="icon" href="img/wireless.png">

    <title>Home Automation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/control.css" rel="stylesheet" type="text/css"/>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootbox.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

    <body onload="startTime()">
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
                <li class="active"><a href="control.php">Home</a></li>
                <li><a href="relay.php">Light Control</a></li>
                <li><a href="water.php">Water Level</a></li>
                <li><a href="window.php">Windows</a></li>
                <li><a href="history.php">History</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

        <div class="container" id="homesensor">
            <div class="row">
                <div class="col-sm-12">
                    <div id="cc">
                        <div id="clock"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                          <div class="col-sm-6">
                              <div id="aa">

                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div id="bb">

                              </div>
                          </div>
                        </div>

        </div>
        <script>
    $(document).ready(function(){
        setInterval(function() {
            $("#aa").load("temp_update.php");
            $("#bb").load("huma_update.php");
        }, 1000);
    });

        function startTime() {
            var a_p = "";
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            if (h < 12) {
            a_p = "<span>AM</span>";
            } else {
                a_p = "<span>PM</span>";
            }
            if (h == 0) {
                h = 12;
            }
            if (h > 12) {
                h = h - 12;
            }
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML =
            h + " : " + m + " : " + s + " " + a_p;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
        </script>
  </body>
</html>
