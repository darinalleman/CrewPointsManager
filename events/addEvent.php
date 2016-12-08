<!DOCTYPE html>
<!--RYAN HANDLEY-->
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Add an Event</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <script language = "JavaScript">


	function validateDate(input)
	{
		var reg = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
		if(!reg.test(input))
		{
			return "Date format is invalid\n";
		}
		return "";
	}

	function validateTime(input)
	{
		var reg = /([01]?[0-9]|2[0-3]):[0-5][0-9])/;
		
		if(!reg.test(input))
		{
			return "time format is not valid\n";
		}
		return "";
	}

	function validatePoints(input)
	{
		if(!isNaN(input))
		{
			return "points field needs to be an integer\n";
		}
		return "";
	}

	function validateAll()
	{
		
		
		fail += validateDate(document.getElementById("event_date").value);
		fail += validateTime(document.getElementById("event_time").value);
		fail += validatePoints(document.getElementById("points").value);

		if(fail == "") return true;
		else
		{
			 alert(fail);
			return false;
		}
	}
	</script>

<body>
  <nav class="red" role="navigation">
    <div  style="width:100%" class="nav-wrapper container"><a id="logo-container"
         href="../" class="brand-logo"><img src=../Ship_logo.png>
      <ul class="right hide-on-med-and-down">
        <li><a onclick="location.href='../index.php'" >Home</a></li>
        <li><a onclick="location.href='../teams/home.php'" >Teams</a></li>
        <li><a onclick="location.href='home.php'">Subscriptions</a></li>
        <?php require_once('../users/setProfileLink.php');?>
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
			
				if(preg_match('/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/', $event_time) && preg_match('/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/', $event_date) && 						is_numeric($points))
				{
					require '../db_info/db.php';
					include '../subscriptions/sendNewEventEmail.php';
				 	$stmt = $conn->prepare("INSERT INTO EVENTS(event, location, event_date, event_time, points) VALUES(?,?,?,?,?)");
				 	$stmt->bind_param('ssssi', $event, $location, $event_date, $event_time, $points);
				 	if(!$stmt->execute())
				 	{
					 	$message = "form did not submit!";
					 	echo "<script type='text/javascript'>alert('$message');</script>";
				 	}
				 	else
				 	{
					 /** EMAIL Functionality written by Darin Alleman **/
						$admin_email = "crews-no-reply@cs.ship.edu";
						$subject = "New Event for Ship CS Crews!";
						
						$result = mysqli_query($conn,"SELECT * FROM SUBSCRIPTIONS;");
						while ($row = mysqli_fetch_array($result))
						{
							$email = $row[0];
							$crypt = openssl_encrypt($email, "aes-256-ctr", $key);
							$body = "A new event has been created!
		
							Event: ".$event."
							Location: ".$location."
							Date: ".$event_date."
							Time: ".$event_time."
							Points up for grabs: ".$points."
		
							We hope to see you there!
							
							Note: This will be your only email reminder! Please remember to check on the website for changes.
							
							
		
							To unsubscribe from this list, click here: 
							Unsubscribe: //webprog.cs.ship.edu/webprog29/subscriptions/unsub.php?email=".$crypt."
							";
		
							
							mail($email, "$subject", $body, "From:" . $admin_email);
							$conn->close();
						}
					
					$conn->close();
				 	header('Location: ../events/home.php');
				 	}
				 }
				 else
				 {
					 echo "input not valid";
				 }
			
		}
		
		


	    ?>
		<form name="form1" id="form1" method ="post" action="addEvent.php" onubmit="return validateAll()">
			<label>Event:</label><br>
			<input type = "text" id ="event" name = "event" required><br>
			<label>Location:</label><br>
			<input type = "text" id = "location" name = "location" required><br>
			<label>Date (YYYY-MM-DD):</label><br>
			<input type = "text" id = "event_date" name ="event_date" required><br>
			<label>Time (24 hour format):</label><br>
			<input type = "text" id = "event_time" name = "event_time" required><br>
			<label>Points:</label><br>
			<input type ="text" id = "points" name = "points" required><br>
			<input class = "btn-large" value = "submit" type = "submit">
		</form>
		<br>
		<a href="home.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-2 black-text">Cancel</a>
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
          <p class="grey-text text-lighten-4">Ryan Handley</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <a class="grey-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script src="../js/init.js"></script>
  </body>
</html>
