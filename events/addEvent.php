<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Add an Event</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script>

	var errorString = "";

	function validateEventInput(input)
	{
		return (field = "") ? "Event field is empty.\n" : "";
	}

	function validateLocation(input)
	{
		return (field = "") ? "Event field is empty.\n" : "" ;
	}

	function validateDate(input)
	{
		if(input == "") return "Date field is empty.\n";

		else if(!/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/.test(input))
		{
			return "Date format is invalid\n";
		}
		return "";
	}

	function validateTime(input)
	{
		if(input ==  "") return "Time field is empty.\n"
		else if(!/([01]?[0-9]|2[0-3]):[0-5][0-9])/.test(input))
		{
			return "time format is not valid\n";
		}
		return "";
	}

	function validatePoints(input)
	{
		if(input == "") return "points field is empty\n";
		else if(!isNaN)
		{
			return "points field needs to be an integer\n";
		}
		return "";
	}

	function validateAll(form)
	{
		fail = validateEventInput(form.event.value);
		fail += validateLocation(form.location.value);
		fail += validateDate(form.event_date.value);
		fail += validateTime(form.event_time.value);
		fail += validatePoints(form.points.value);

		if(fail == "") return true
		else
		{
			alert(fail);
			return false;
		}
	}
</script>
</head>
<body>
  <nav class="red" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.php'" >Home</a></li>
        <li><a onclick="location.href='../teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='home.php'">Subscriptions</a></li>
        <li><a href="../users/home.html"><i class="material-icons left">account_circle</i>Profile</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a onclick="location.href='teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='events/home.php'" >Events</a></li>
        <li><a onclick="location.href='home.php'" >Subscriptions</a></li>
        <?php require_once('../users/setProfileLinkMobile.php');?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container" style="height:100%">
        <br>
      <h4 class="header center blue-text">Add an Event</h1>

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

		if(isset($_POST['event']) && isset($_POST['location']) && isset($_POST['event_date']) && isset($_POST['event_time']) && isset($_POST['points']))
		{
			$event = sanitize($_POST['event']);
			$location = sanitize($_POST['location']);
			$event_date = sanitize($_POST['event_date']);
			$event_time = sanitize($_POST['event_time']);
			$points = sanitize($_POST['points']);

			require '../db_info/db.php';
			include '../subscriptions/sendNewEventEmail.php';
		 	$stmt = $conn->prepare("INSERT INTO EVENTS(event, location, event_date, event_time, points) VALUES(?,?,?,?,?)");
		 	$stmt->bind_param('ssssi', $event, $location, $event_date, $event_time, $points);
			sendEventEmail($event, $event_date, $location, $event_time, $points);
		 	if(!$stmt->execute())
		 	{
			 	$message = "form did not submit!";
			 	echo "<script type='text/javascript'>alert('$message');</script>";
		 	}
		 	else
		 	{
		 		
		 		header('Location: ../events/home.php');
		 	}

		}
	    ?>


		<form method ="post" action="addEvent.php" onsubmit = "return validateAll(this)">
			<label>Type:</label><br>
			<input type = "text" id ="event" name = "event"><br>
			<label>Location:</label><br>
			<input type = "text" id = "location" name = "location"><br>
			<label>Date (YYYY-MM-DD):</label><br>
			<input type = "text" id = "event_date" name ="event_date"><br>
			<label>Time (24 hour format):</label><br>
			<input type = "text" id = "event_time" name = "event_time"><br>
			<label>Points:</label><br>
			<input type ="text" id = "points" name = "points"</label><br>

			<button type = "submit">Submit</button>
		</form>
        </div>
        <br>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
