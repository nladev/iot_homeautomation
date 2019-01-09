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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Home Automation Control">
    <meta name="author" content="Nay Lin Aung">
    <link rel="icon" href="img/wireless.png">

    <title>Home Automation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/water.css" rel="stylesheet" type="text/css"/>

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
                <li class="active"><a href="water.php">Water Level</a></li>
                <li><a href="window.php">Windows</a></li>
                <li><a href="history.php">History</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="progress progress-bar-vertical" id="water">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" id="water_height">
                </div>
            </div>
                </div>
                <div class="col-sm-6">
                    <h4>NOTE! Height must be 2 to 400cm.</h4>
                    <div class="setting">
                        <label>Your water tank height :</label>
                    <span>
                                <?php
                            include ("config/config.php");
                            $high = 0;
                            $res = $connection->query("Select value from water where name='water'");
                            if($datah = $res->fetch_array()){
                                $high = $datah['value'];
                            }
                            echo $high.'cm';
                            ?>
                            </span>
                            <button type="button" class="aa" onclick="openbox()" style="float:right;margin-right:10px;">Change</button>
                          </div>


                    <div id="myOverlay" class="overlay">
                      <span class="closebtn" onclick="closebox()" title="Close Overlay">x</span>
                      <div class="overlay-content">
                        <form id="waterChange" method="POST" action="waterupdate.php">
                                <input id="msg" type="text"  name="msg" placeholder="change deep">
                                <input type="submit"  value="Change">
                        </form>
                      </div>
                    </div>
                    <div>
                      <div id="mode">
                              <label>Water Pump</label>
                              <div style="float:right;margin-right:10px;" id="btn9">
                              </div>
                      </div>
                    </div>
            </div>
        </div>
        <script>
        $(document).ready(function(){
            setInterval(function() {
                $("#water_height").load("water_cal.php",function(result){
                  $("#water_height").css("height",result);
                });
            }, 1000);
        });

        function openbox() {
          document.getElementById("myOverlay").style.display = "block";
        }

        function closebox() {
          document.getElementById("myOverlay").style.display = "none";
        }
        //Control
        var devicestate9="<?php echo $waterState; ?>";
        var button9=document.createElement("BUTTON");
        button9.setAttribute("id","b9");
        button9.classList.add("aa");
        if(devicestate9=="ON")
        {
        var newstate9="OFF";
        button9.style.backgroundColor="red";
        var buttontext9=document.createTextNode(newstate9);
        }
        else
        {
        var newstate9="ON";
        button9.style.backgroundColor="#33cc33";
        var buttontext9=document.createTextNode(newstate9);
        }
        button9.appendChild(buttontext9);
        document.getElementById("btn9").appendChild(button9);

        button9.addEventListener("click",button9click);
        function button9click()
        {
        var c=document.getElementById("b9")
        var x=c.textContent;
        if(x=="OFF")
        {
        button9.innerText="ON";
        button9.style.backgroundColor="#33cc33";
        window.location="pumpcontrol.php?state=OFF&number=8";
        }
        else if(x=="ON")
        {
        button9.innerText="OFF";
        button9.style.backgroundColor="red";
        window.location="pumpcontrol.php?state=ON&number=8";
        }
        }
        </script>

  </body>
</html>
