<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>2016-2017 Crew Points Tracker</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="#b71c1c green"  role="navigation">
    <div style="width:100%" class="nav-wrapper container"><a id="logo-container" href="../" class="brand-logo"><img src=../Ship_logo.png></a>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.php'" >Home</a></li>
        <li><a onclick="location.href='../events/home.php'" >Events</a></li>
        <li><a onclick="location.href='../subscriptions/home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="row">
  <div class="col s3">
  	
  <br><p><a class='dropdown-button btn' href='#' data-activates='dropdown1'>Choose Team</a></p>

  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#NullPointer">Null Pointer</a></li>
    <li class="divider"></li>
    <li><a href="#OffByOne">Off By One</a></li>
    <li class="divider"></li>
    <li><a href="#OutOfBounds">Out Of Bounds</a></li>
  </ul>
  </div>
  </div>
  <?php
  	require '../db_info/db.php';
  	
  	function _get_post($conn, $var)
  	{
  		return $conn->real_escape_string($_POST[$var]);
  	}
  	
  	if(isset($_POST['teamName']) &&
  	   isset($_POST['teamLeader']) &&
  	   isset($_POST['teamColor']) &&
  	   isset($_POST['teamPoints']))
  	{
  		$query = $conn->prepare("INSERT INTO TEAMS (teamName, teamLeader, teamColor, teamPoints) Values (?, ?, ?, ?)");
          $query->bind_param("ssssi", $teamName, $teamLeader, $teamColor, $teamPoints);
          $teamName = _get_post($conn, 'teamName');
          $teamLeader = _get_post($conn, 'teamLeader');
          $teamColor = _get_post($conn, 'teamColor');
          $teamPoints= _get_post($conn, 'teamPoints');
          $result = $query->execute();
  	}
  ?>
  <div class="row center">
    <form class="col s12" onsubmit="return validate(this)" method="post">
      <div class="row">
        <div class="input-field inline">
          <input id="team_name" type="text" class="validate">
          <label for="team_name">Team Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field inline">
          <input id="team_points" type="number" class="validate">
          <label for="team_points">Team Points</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field inline">
        	<input id="team_color" type="text" class="validate">
          <label for="team_color">Team Color</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field inline">
          <input id="team_leader" type="text" class="validate">
          <label for="team_leader">Team Leader</label>
        </div>
      </div>
      <div class="file-field input-field inline">
        <div class="btn">
        	<span>File</span>
        	<input type="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
          <label for="team_logo">Team Logo</label>
        </div>
      </div>
      <br><br>
      <button class="btn waves-effect waves-light" type="submit" name="edit">Save Changes
    		<i class="material-icons right">send</i>
  	 </button>
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
  
</body>
</html>
