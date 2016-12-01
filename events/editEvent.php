<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Subscriptions</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="orange" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container" 
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.html'" >Home</a></li>
        <li><a onclick="location.href='../teams/home.html'" >Teams</a></li>
        <li><a onclick="location.href='home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='teams/home.html'" >Teams</a></li>
        <li><a onclick="location.href='events/home.html'" >Events</a></li>
        <li><a onclick="location.href='home.php'" >Subscriptions</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Edit An Event</h1>
      
      <div class="row center">
        <div style="width:50%; margin:auto;">
            <?php
	            
	            if(isset($_POST['type'])) $type = $_POST['type'];
				if(isset($_POST['date']))$date = $_POST['date'];
				if(isset($_POST['location'])) $location = $_POST['location'];
				if(isset($_POST['time'])) $time = $_POST['time'];
				if(isset($_POST['points'])) $points = $_POST['points'];
	            
	            $username = "webprog29";
	            $servername = "webprog.cs.ship.edu";
	            $username = "webprog29";
	            $password = "sweamare";
	            $dbname = "webprog29";
	            
	          	$conn = new mysqli($servername, $username, $password, $dbname);
echo <<<_END
		<form name = "addElectronic" method ="post" action ="editEvent.php">
			<label>Type:</label><br>
			<input type = "text" name = "type"><br>
			<label>Date:</label><br>
			<input type = "text" name = "date"><br>
			<label>Location:</label><br>
			<input type = "text" name ="location"><br>
			<label>Time:</label><br>
			<input type = "text" name = "time"><br>
			<label>points:</label><br>
			<input type ="text" name = "points"</label><br><br>
			<button type = "submit">submit</button>
		</form>
_END;
	            
	          
	           
	           
	
	          
	       ?>
        </div>
        
        <?php
	        //checks to see if the user is logged in. 
		 	if(session_status() == PHP_SESSION_ACTIVE)   
		 	{
			 	echo "logged in";
		 	}
		 	else
		 	{
			 	echo "not logged in";
		 	} 
		 ?>
      </div>
      <br><br>

    </div>
  </div>

  <footer class="page-footer grey darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="grey-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
