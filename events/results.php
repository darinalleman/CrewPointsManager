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
  <nav class="red"  role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
	    <li><a onclick="location.href="home.php >Home</a></li>
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
      <h1 class="header center teal-text">Results</h1>
      <div class="row center">
      	<table class="bordered" style="width:100%">
            <thead>
              <tr>
                <th data-field="event">Date</th>
                <th data-field="location">Event</th>
                <th data-field="date">Winner</th>
              </tr>
            </thead>
            <tbody>
              <?php
              		require '../db_info/db.php';
              		$query = "SELECT event_date, event, name FROM EVENTS e, RESULTS r, TEAMS t WHERE r.event_id = e.id AND r.winner_id = t.id AND event_date < CURDATE() ORDER BY event_date";
              		$result = $conn->query($query);

              		while($row = mysqli_fetch_array($result))
              		{
              			echo "<tr>";
              			echo "<td>".$row['event_date']."</td>";
              			echo "<td>".$row['event']."</td>";
              			echo "<td>".$row['name']."</td>";
              			echo "</tr>";
              		}
              ?>

            </tbody>
          </table>
      </div>
      <div class="row center">
        <a href="home.php" id="download-button" class="btn-large <?php if(!$loggedin){ ?> enabled<?php } ?> waves-effect waves-light teal lighten-2 black-text">Go Back</a>
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
