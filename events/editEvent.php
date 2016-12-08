<html>
	<head><title>Edit an Event</title></head>
	<body>
		<h5> Edit an Event</h5>
		<?php
			
			function sanitize($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		require '../db_info/db.php';            
		   	$dateQuery = "SELECT event_date FROM EVENTS where event_date > CURDATE()";
            $date_result = $conn->query($dateQuery);
            echo "<form method = 'GET' action = 'editEvent.php' name = 'date'>";
            echo"<select name = 'dateField' id = 'dateField'>";
            while ($dateRow=mysqli_fetch_array($date_result)) 
            {
            	$date=$dateRow["event_date"];
                echo "<option>$date</option>";
            
            }
             echo "</select>";
             echo "<button type = 'submit'>Submit</button>";
             echo "</form>";
             $queryDate = $date;
             
             if(isset($_GET['dateField']))
			{
				//echo "date field set";
				$date = $_GET['dateField'];
				$queryDate = $date;
				//echo $date;
				require '../db_info/db.php';
				$eventQuery = "SELECT event FROM EVENTS WHERE event_date = '$date'";
				$eventResult = $conn->query($eventQuery);
				echo "<form method = 'POST' action = 'editEvent.php' name = 'event'>";
				echo"<select name = 'eventField' id = 'eventField'>";
				while ($eventRow=mysqli_fetch_array($eventResult)) 
				{
					$event=$eventRow["event"];
					echo "<option>$event</option>";
				}
				echo "</select>";
				echo "<br><br>";
				echo "Location ";
				echo "<input type = 'text' name = 'location'><br>";
				echo "Time (XX:XX)";
				echo "<input type = 'text' name = 'time'><br>";
				echo "Points";
				echo "<input type = 'text' name = 'points'><br>";
				echo "<button type = 'submit'>Submit</button><br><br>";
			}
			if(isset($_POST['eventField']))
			{
				$event = sanitize($_POST['eventField']);
				$location = sanitize($_POST['location']);
				$time = sanitize($_POST['time']);
				$points = sanitize($_POST['points']);
				
				if($location == "" || $time == "" || $points == "")
				{
					echo "update Unsuccessful. No fields can be left blank.";
				}
				else
				{
					$query = "UPDATE EVENTS SET location = '$location', event_time = '$time', points = $points WHERE event = '$event' AND event_date = '$queryDate'";
					echo $query;
					$conn->query($query);
					$conn->close();
					header('Location: ../events/home.php');
				
				}
			
				
				
			}
			?>

		
		
	</body>
	<br>
	<a href = home.php>go back</a>
	
</html>
