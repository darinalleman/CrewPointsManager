<?php

// Define some constants
define( "RECIPIENT_NAME", "Nathan Goates" );
define( "RECIPIENT_EMAIL", "nathan.goates@gmail.com" );
define( "EMAIL_SUBJECT", "SMSSS Email Signup Request" );

// Read the form values
$success = false;
$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";

$messagecontent = "\r\n Name:" . $senderName . "\r\n Email:" . $senderEmail . "\r\n Message:" . $message;

$SpamErrorMessage = "No Websites URLs permitted";
if(preg_match("/http/i", "$senderName")) {echo "$SpamErrorMessage"; exit();}
if(preg_match("/http/i", "$senderEmail")) {echo "$SpamErrorMessage"; exit();}
if(preg_match("/http/i", "$message")) {echo "$SpamErrorMessage"; exit();}

  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, EMAIL_SUBJECT, $messagecontent, $headers );

?>
<html>
  <head>
    <title>You are now in the know!</title>
  </head>
  <body style="background-color:#656565;">
  <div style="margin-left:auto; margin-right:auto; margin-top:200px; text-align:center; color:#fff !important; font-size:24px; line-height:30px; font-weight:bold; font-family:Arial;">
  <?php if ( $success ) echo "<p>You will receive the next email about the series.</p>" ?>
  <?php if ( !$success ) echo "<p>Sorry but something weird happened. Please try again.</p>" ?>
  <p>Click your browser's Back button to return to the page.</p>
  </div>
  </body>
</html>


