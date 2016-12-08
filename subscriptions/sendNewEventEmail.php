<!--
Author: Darin Alleman
-->

<?php
function sendEventEmail($event_type, $event_date, $event_location, $event_time, $event_points)
{
  require '../db_info/db.php';
  $admin_email = "crews-no-reply@cs.ship.edu";
  $subject = "New Event for Ship CS Crews!";
  
  if ($conn->connect_error) die($conn->connect_error);
  else
  {
      $result = mysqli_query($conn,"SELECT * FROM SUBSCRIPTIONS;");
      while ($row = mysqli_fetch_array($result))
      {
        $email = $row[0];
        $crypt = openssl_encrypt($email, "aes-256-ctr", $key);
        $body = "A new event has been created!

        Event: ".$event_type."
        Location: ".$event_location."
        Date: ".$event_date."
        Time: ".$event_time."
        Points up for grabs: ".$event_points."

        We hope to see you there!
        
        Note: This will be your only email reminder! Please remember to check on the website for changes.
        
        

        To unsubscribe from this list, click here: 
        Unsubscribe: webprog.cs.ship.edu/webprog29/subscriptions/unsub.php?email=".$crypt."
        ";

        
        mail($email, "$subject", $body, "From:" . $admin_email);
        }
  }
  mysqli_free_result($result);

}
  $conn->close();
 ?>
