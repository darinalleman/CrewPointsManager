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
        <?php require_once('../users/setProfileLink.php'); ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <h4 class="center-align teal-text">Please enter new team details: </h4>
  
  <div class="row center">
     <div style="width:50%; margin:auto;">
  	<?php

		function sanitize($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if(isset($_POST['name']) && isset($_POST['team_leader']) && isset($_POST['team_color']) && isset($_POST['team_points']))
		{
			$name = sanitize($_POST['name']);
			$teamLeader = sanitize($_POST['team_leader']);
			$color = sanitize($_POST['team_color']);
			$points = sanitize($_POST['team_points']);

			require '../db_info/db.php';
		 	$stmt = $conn->prepare("INSERT INTO TEAMS(name, teamLeader, teamColor, teamPoints) VALUES(?,?,?,?)");
		 	$stmt->bind_param('sssi', $name, $teamLeader, $color, $points);
		 	$result = $stmt->execute();
		 	if (!$result) echo "INSERT failed: $query <br> $conn->error <br><br>";
		}
	?>
	
	<form method ="post" action="addteam.php" onsubmit = "return validate(this);">
		<label>Team Name:</label><br>
		<input type = "text" id ="name" name = "name"><br>
		<label>Team Leader:</label><br>
		<input type = "text" id = "team_leader" name = "team_leader"><br>
		<label>Team Color:</label><br>
		<input type = "text" id = "team_color" name ="team_color"><br>
		<label>Points:</label><br>
		<input type = "text" id = "team_points" name = "team_points"><br>

		<button class="btn waves-effect waves-light" type = "submit">Create Team</button>
	</form>
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
  <script>
  	function validate(form)
     {
          fail = validateTeamName(form.name.value);
          fail += validateTeamLeader(form.leader.value);
          fail += validateTeamColor(form.color.value);
          fail += validateTeamPoints(form.points.value);
		
          if (fail == "") return true;
          else
          {
               alert(fail);
               return false;
          }
     }
     
     function validateTeamName(field)
     {
     	if(field == "")
     	{
     		return "No team name entered!";
     	}
     	else if(/^[a-zA-z]+$/.test(field))
     	{
     		if(field == "Null Pointer" || field == "Off By One" || field == "Out Of Bounds")
     		{
     			return "Name is already in use. Please select a different name.";
     		}
     		return "";
     	}
     	else
     	{
     		return "Invalid name.";
     	}
     }
     
     function validateTeamLeader(field)
     {
     	if(field == "")
     	{
     		return "No team leader entered!"
     	}
     	else if(/^[a-zA-z]+$/.test(field))
     	{
     		if(field == "Dr. Girard" || field == "Dr. Wellington" || field == "Dr. Armstrong" || field == "Dr. Lee")
     		{
     			return "Leader already has a crew! Please select a different professor.";
     		}
     		return "";
     	}
     	else
     	{
     		return "Leader is not valid.";
     	}
     }
     
     function validateTeamColor(field)
     {
     	if(field == "")
     	{
     		return "No team color entered!"
     	}
     	else if(/^[a-zA-z]+$/.test(field))
     	{
     		if(field == "Red" || field == "Green" || field == "Blue" || field == "Yellow")
     		{
     			return "Color is already in use. Please select a different color.";
     		}
     		return "";
     	}
     	else
     	{
     		return "Color is not valid.";
     	}
     }
     
     function validateTeamPoints(field)
     {
		if(field == "")
	     {
	         return "No number entered";
	     }
	     else if(isNaN(field) || field <= 1 || field >= 100)
	     {
	         return "Number is not between 1 and 100";
	     }
	     else
	     {
	         return "Number is valid";
	     }
     }
  </script>
  
</body>
</html>
