<html>
	<head><title>Edit an Event</title></head>
	<body>
		<h3>Edit an Event</h3>			
			<?php
				
			$queryDate ="";
			$queryEvent = "";
		
           	require '../db_info/db.php';            
		   	$dateQuery = "SELECT event_date FROM EVENTS";
            $date_result = $conn->query($dateQuery);
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
				echo "<button type = 'submit'>Submit</button>";
				echo "</form>";
				$queryEvent = $event;
				
            }
            if(isset($_POST['eventField']))
            {
	            echo "What would you like to edit";
	            echo "<form method = 'POST' action = 'editEvent.php' name = 'edit'>
	            		<select name = 'edit'>
	            		  <option>event_time</option>
	            		  <option>points</option>
	            		  <option>location</option>
	            		</select>
	            		<button type = 'submit'>Submit</button>
	            	  </form>";
	            	  
	       }
	       if(isset($_POST['edit']))
	       {
		       echo "enter value";
		       echo "<form method = 'POST' action = 'editEvent.php' name = 'input'>
		       		 <input type = 'text'>
		       		 <button type = 'submit'>Submit</button>
		       		 </form>";
		       
	       }
	       if(isset($_POST['dateField']) && isset($_POST['eventField']) && isset($_POST['edit']) && isset($_POST['input']))
	       {
		       $date = strtolower($_POST['dateField']);
		       $event = strtolower($_POST['eventField']);
		       $fieldToEdit = strtolower($_POST['edit']);
		       $changeValue = strtolower($_POST['input']);
		       echo"yeah";
		       
		       $editQuery = "UPDATE EVENTS SET $fieldToEdit = $changeValue WHERE event_date = $date and event = $event";
		       $conn->query($editQuery);
	       }
             ?>		
	</body>
	<a href=home.php>go home </a>
	
	
</html>