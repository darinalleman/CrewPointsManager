<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

  <!--CSS-->
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
        <li><a onclick="location.href='/webprog29/teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='/webprog29/events/home.php'" >Events</a></li>
        <li><a onclick="location.href='/webprog29/subscriptions/home.php'">Subscriptions</a></li>
        <hr>
        <?php require_once('../users/setProfileLinkMobile.php');?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="row">
  <div class="col s3">
  	
  <br>
	
  <div class="input-field col s12">
    <select id="dropdown1">
			 <option value=""  selected>Choose a team to edit</option>
			<?php
  		require '../db_info/db.php';
  		$query = "SELECT * FROM TEAMS";
  		$result =  mysqli_query($conn, $query);
  		$teamData = array();
 
  		while($row = mysqli_fetch_assoc($result))
  		{
  			$teamName = $row['name'];
  			$teamLead = $row['teamLeader'];
  			$teamColor = $row['teamColor'];
  			$teamPoints = $row['teamPoints'];
				$teamid = $row['id'];
  			$temp = array($teamName, $teamLead, $teamColor, $teamPoints, $teamid);
  			array_push($teamData, $temp);
  			echo "<option>$teamName</option>";
  		}
			
  	?>
    </select>
    <label></label>
  </div>
</div>
</div>
<?php

	if (isset($_GET['teamName']))
			{
				$id = $_GET['teamName'];

					if($id) {
							for ($i = 0; $i < sizeof($teamData); $i++)
							{
								if ($id == $teamData[$i][0])
								{
									$teamNameToSet = $teamData[$i][0];
									$teamLeaderToSet  = $teamData[$i][1];
									$teamColorToSet = $teamData[$i][2];
									$teamPointsToSet = $teamData[$i][3];
									$teamIdSetting = $teamData[$i][4];
								}
							}
					}
			}
	?>

  <?php
  	require '../db_info/db.php';
  	
  	function sanitize($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
  	
  	if(isset($_POST['name']) && isset($_POST['team_leader']) && isset($_POST['team_color']) && isset($_POST['team_points']) && isset($_POST['team_id']))
	{
		
		$name = sanitize($_POST['name']);
		$teamLeader = sanitize($_POST['team_leader']);
		$color = sanitize($_POST['team_color']);
		$points = sanitize($_POST['team_points']);
		$id = $_POST['team_id'];
		
		require '../db_info/db.php';
	 	$stmt = $conn->prepare("UPDATE TEAMS SET name = '$name', teamLeader = '$teamLeader', teamColor = '$color', teamPoints = '$points' WHERE id='$id'");
	 	// $stmt->bind_param('sssi', $name, $teamLeader, $color, $points);
	 	$result = $stmt->execute();
	 	if (!$result) echo "UPDATE failed: $stmt <br> $conn->error <br><br>";
	}
  ?>
  <div class="row-center">
  <div style="width:50%; margin:auto;">

  <form method ="post" action="editteam.php" onsubmit = "return validateAll(this);">
	<label>Team Name:</label><br>
	<input type = "text" id ="name" name = "name" value = "<?php echo $teamNameToSet; ?>"><br>
	<label>Team Leader:</label><br>
	<input type = "text" id = "team_leader" name = "team_leader"value = "<?php echo $teamLeaderToSet; ?>"><br>
	<label>Team Color:</label><br>
	<input type = "text" id = "team_color" name ="team_color"value = "<?php echo $teamColorToSet; ?>"><br>
	<label>Points:</label><br>
	<input type = "text" id = "team_points" name = "team_points" value = "<?php echo $teamPointsToSet; ?>"><br>
	<input type="hidden" name="team_id" value = "<?php echo $teamIdSetting; ?>" />
	<button class="btn waves-effect waves-light" type = "submit">Save Changes</button>
   </form>
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


  <!--Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script src="../js/init.js"></script>
  <script>
	 $(document).ready(function() {
    $('select').material_select();
  	});
  	$("#dropdown1").change(function() {
  		var selected = $("#dropdown1 option:selected").text();
			if (selected != "Choose a team to edit")
			{
					window.location.href="editteam.php?teamName="+selected;
			}
  		
  	});
  </script>
</body>
</html>