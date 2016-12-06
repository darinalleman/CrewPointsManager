<?php
require_once('../db_info/config.php');
require_once('../db_info/db.php');
require_once('sendNewEventEmail.php');
//if "email" variable is filled out, send email
if (isset($_REQUEST['email']))  {
  $email = $_REQUEST['email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  else{
    $crypt = openssl_encrypt($email, "aes-256-ctr", $key);
    $admin_email = "crews-no-reply@cs.ship.edu";
    $subject = "Confirm your Ship CS Department Crews subscription";

    $body = "
    Confirm your subscription:

    webprog.cs.ship.edu/webprog29/subscriptions/confirm.php?email=".$crypt."






    If you did not request this email, you can safely ignore it.

    Unsubscribe: webprog.cs.ship.edu/webprog29/subscriptions/unsub.php?email=".$crypt."
    ";

    //send email
    mail($email, "$subject", $body, "From:" . $admin_email);

    //Email response
    echo "<p>Check your email for a confirmation link.</p><br><br><br><br>";
  }
}
else{
  echo "
<form id=\"emailform\" method=\"post\">
    <input id=\"email\" name=\"email\" placeholder=\"Your email address\" type=\"email\" />
    <input id=\"validate\" class=\"btn-large waves-effect waves-light light-blue\" type=\"submit\" value=\"Subscribe\" />
</form>";
}
?>
