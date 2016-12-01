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
  <nav class="red" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container" 
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.html'" >Home</a></li>
        <li><a onclick="location.href='../teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='../subscriptions/home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='../teams/home.html'" >Teams</a></li>
        <li><a onclick="location.href='home.php'" >Events</a></li>
        <li><a onclick="location.href='../subscriptions/home.php'" >Subscriptions</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Events</h1>
	      <div class = "row-center">
		  <div style="width:50%; margin:auto;">
			  <table class='centered' style="width:100%"><thead><tr><th>Event Type</th><th>Location</th><th>Date</th><th>Time</th><th>Points</th><th>Winner</th></tr></thead>
		    <?php
	            $username = "webprog29";
	            $servername = "webprog.cs.ship.edu";
	            $username = "webprog29";
	            $password = "sweamare";
	            $dbname = "webprog29";
	            
	          	$conn = new mysqli($servername, $username, $password, $dbname);
	            
	            
	            displayEvents($conn);	          
	          function displayEvents($conn)
			  {
			  	//opens a table tag, and creates a result set object from a database query. We can then fetch information from this result set object
			  	//row by row to fill our table.
				$sql = ("SELECT* FROM EVENTS");
				if(!$result = $conn->query($sql))
				{
					die('error running the query');
			
				}
				//fetches each row of the result set into an associative array
				//until there are no rows left
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>$row[event_type]</td><td>$row[event_location]</td><td>$row[event_date]</td><td>$row[event_time]</td><td>$row[event_points]</td><td>$row[event_winner]</td>";
					echo "</tr>";
				}
		
				$result->free();
			}
	          
	       ?>
			  </table>
		  </div>
        </div>
        <div class="row center">
        <a href="addEvent.php" id="download-button" class="btn-large <?php if(!$loggedin){ ?> enabled <?php } ?> waves-effect waves-light teal lighten-black-text">Add Event</a>
        <a href="editteam.html" id="download-button" class="btn-large <?php if(!$loggedin){ ?> disabled <?php } ?> waves-effect waves-light teal lighten-2 black-text">Edit Event</a>
        <a href="removeteam.html" id="download-button" class="btn-large <?php if(!$loggedin){ ?> disabled <?php } ?> waves-effect waves-light teal lighten-2 black-text">Remove Event</a><br>
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
