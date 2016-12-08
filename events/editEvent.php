<html>
	<!--RYAN HANDLEY-->
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
		   	$dateQuery = "SELECT DISTINCT event_date FROM EVENTS WHERE event_date > CURDATE() ORDER BY event_date";
            $date_result = $conn->query($dateQuery);
            echo"date:";
            echo "<form method = 'POST' action = 'editEvent.php' name = 'date'>";
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
             
             if(isset($_POST['dateField']))
			{
				//echo "date field set";
				$date = $_POST['dateField'];
				$queryDate = $date;
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
				echo "<input type = 'text' name = 'location' required><br>";
				echo "Time (XX:XX)";
				echo "<input type = 'text' name = 'time' required><br>";
				echo "Points";
				echo "<input type = 'text' name = 'points' required><br>";
				echo "<button type = 'submit'>Submit</button><br><br>";
			}
			if(isset($_POST['eventField']))
			{
				$event = sanitize($_POST['eventField']);
				$location = sanitize($_POST['location']);
				$time = sanitize($_POST['time']);
				$points = sanitize($_POST['points']);
				
				if(!preg_match('/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/', $time) || !is_numeric($points))
				{
					echo "form fields not valid";
				}
				else
				{
					$query = "UPDATE EVENTS SET location = '$location', event_time = '$time', points = $points WHERE event = '$event'";
					//$stmt = $conn->prepare("UPDATE EVENTS SET location = ?, event_time = ?, points = ? WHERE event = ?");
					//$stmt->bind_param('ssis', $location, $time, $points, $event);
					//$stmt.execute();
					$conn->query($query);
					$conn->close();
					header('Location: ../events/home.php');
				
				}
			}
		?>
	</body>
	<br>
	<a href = home.php>cancel</a>
	<br><br>
	<p>Ryan Handley - baby's first website</p>
	
</html>
