<!DOCTYPE html>
<!RYAN HANDLEY-->
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="red"  role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
	    <li><a onclick="location.href='../index.php'" >Home</a></li>
        <li><a onclick="location.href='/webprog29/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/webprog29/subscriptions/home.php'">Subscriptions</a></li>
        <?php require_once('../users/setProfileLink.php'); ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
	    <li><a onclick="location.href="home.php >Home</a></li>
        <li><a onclick="location.href='/webprog29/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/webprog29/subscriptions/home.php'">Subscriptions</a></li>
        <hr>
        <?php require_once('../users/setProfileLinkMobile.php');?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text">Remove an Event</h1>
      <div class="row center">
      	<table class="bordered" style="width:100%">
            <thead>
              <tr>
                <th data-field="event">Event</th>
                <th data-field="location">Location</th>
                <th data-field="date">Date (YYYY-MM-DD)</th>
                <th data-field="time">Time</th>
                <th data-field="points">Points</th>
              </tr>
            </thead>
            <tbody>
              <?php
	              function sanitize($data)
				  {	
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
              		require '../db_info/db.php';
              		$query = "SELECT * FROM EVENTS ORDER BY event_date";
              		$result = $conn->query($query);

              		while($row = mysqli_fetch_array($result))
              		{
              			echo "<tr>";
              			echo "<td>".$row['event']."</td>";
              			echo "<td>".$row['location']."</td>";
              			echo "<td>".$row['event_date']."</td>";
              			echo "<td>".$row['event_time']."</td>";
              			echo "<td>".$row['points']."</td>";
              			echo "</tr>";
              		}
              		
              		if(isset($_POST['event']) && isset($_POST['date']))
              		{
	              		if(preg_match('/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/', $_POST['date']) && preg_match('/^[a-zA-Z]+$/', $_POST['event']))
	              		{
	              			$date = sanitize($_POST['date']);
				  			$event = sanitize($_POST['event']);
	              		
		              		$stmt = $conn->prepare("DELETE FROM EVENTS WHERE event = ? AND event_date = ?");
					  		$stmt->bind_param('ss', $event, $date);
					  		$stmt->execute();
					  		header('Location: ../events/home.php');
					  	}
					  	else
					  	{
						  	echo "fields not valid";
					  	}
              		}	              	
	           ?>
			</tbody>
          </table>
      </div>

      <div class = "center">
	   <h5 class="header center teal-text">Remove an Event</h1>
	   <form method = "post" action = "removeEvent.php">
		<label name = "event">Event</label>
		<input name = "event" type = "text">
		<label name = "date">Date</label>   
		<input name = "date" type = "text">
		<input class = "btn-large" value = "submit" type = "submit">
		</form>
		<br>
		<a href="home.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-2 black-text">Cancel</a>
	   </div>
 
      <br><br>
	  
    </div>

  <div class="container">
    <div class="section">

      </div>

    </div>

  <<footer class="page-footer grey darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
        </div>
      </div>
    </div>
    <!--<div class="footer-copyright">-->
      <div class="container">
      	<div class="row">
      		<div class="col 16 s12 grey-text text-lighten-3">
      			Ryan Handley
      		</div>
      		<div class="col 14 offset-12 s12 grey-text text-lighten-3">
      			Powered by <a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      		</div>
      	</div>
      <!--</div>-->
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script src="../js/init.js"> </script>

  </body>
</html>
