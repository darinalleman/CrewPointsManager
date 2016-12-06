<!DOCTYPE html>
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
  <nav class="#b71c1c green"  role="navigation">
    <div style="width:100%" class="nav-wrapper container"><a id="logo-container" href="../" class="brand-logo"><img src=../Ship_logo.png></a>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.php'" >Home</a></li>
        <li><a onclick="location.href='../events/home.php'" >Events</a></li>
        <li><a onclick="location.href='../subscriptions/home.php'">Subscriptions</a></li>
        <li><a href="../users/home.php"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text">Teams</h1>
      <div class="row center">
      	<table class="centered" style="width:100%">
            <thead>
              <tr>
                <th data-field="name">Team</th>
                <th data-field="teamLeader">Leader</th>
                <th data-field="teamColor">Color</th>
                <th data-field="teamPoints">Points</th>
              </tr>
            </thead>
            <tbody>
              <?php
              		require '../db_info/db.php';
              		$query = "SELECT * FROM TEAMS";
              		$result = $conn->query($query);
              		$npPointsQuery = "SELECT SUM(points) AS points FROM EVENTS e, RESULTS r, TEAMS t where r.id = e.id and r.winner_id = t.id and t.name = 'Null Pointer'";
              		$npPointsResult = $conn->query($npPointsQuery);

              		while($row = mysqli_fetch_array($result))
              		{
              			echo "<tr>";
              			echo "<td>".$row['name']."</td>";
              			echo "<td>".$row['teamLeader']."</td>";
              			echo "<td>".$row['teamColor']."</td>";
              			$nameString = $row['name'];
              			$npPointsQuery = "SELECT SUM(points) AS points FROM EVENTS e, RESULTS r, TEAMS t where r.event_id = e.id and r.winner_id = t.id and t.name = '$nameString'";
			  			      $npPointsResult = $conn->query($npPointsQuery);

			  		        while($row2 = mysqli_fetch_array($npPointsResult))
			  		        {
              				echo "<td>".$row2['points']."</td>";
              				echo "</tr>";
              			}

              		}

              ?>
            </tbody>
          </table>
      </div>
      <div class="row center">
        <a href="addteam.php" id="download-button" class="btn-large <?php if(!$loggedin){ ?> enabled <?php } ?> waves-effect waves-light teal lighten-2 black-text">Add Team</a>
        <a href="editteam.php" id="download-button" class="btn-large <?php if(!$loggedin){ ?> enabled <?php } ?> waves-effect waves-light teal lighten-2 black-text">Edit Team</a>
        <a href="removeteam.php" id="download-button" class="btn-large <?php if(!$loggedin){ ?> enabled <?php } ?> waves-effect waves-light teal lighten-2 black-text">Remove Team</a><br>
      </div>
      </div>
      <br><br>

    </div>

  <div class="container">
    <div class="section">

      </div>

    </div>

  <footer class="page-footer light-blue darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
        </div>
      </div>
    </div>
      <div class="container">
      	<div class="row">
      		<div class="col 16 s12 grey-text text-lighten-3">
      			Created by Andrew Corchado
      		</div>
      		<div class="col 14 offset-12 s12 grey-text text-lighten-3">
      			Powered by <a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      		</div>
      	</div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

  </body>
</html>
