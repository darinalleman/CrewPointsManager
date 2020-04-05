<?php
//if "email" variable is filled out, send email
if (isset($_REQUEST['email']) && isset($_REQUEST['first']) && isset($_REQUEST['last']) && isset($_REQUEST['message']))  {
  $email = $_REQUEST['email'];
  $first = $_REQUEST['first'];
  $last = $_REQUEST['last'];
  $message = $_REQUEST['message'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  else{
        require 'class.phpmailer.php';
        require 'class.smtp.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'darin.alleman@gmail.com';                 // SMTP username
        $mail->Password = 'tcivusnekdycbksp';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('shipcycling@gmail.com', 'Ship Cycling');
        $mail->addAddress('shipcycling@gmail.com', 'shipcycling.club');     // Add a recipient          

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'A message from a user on ShipCycling.club ';
        $mail->Body    =  $first . " " . $last . " sent this from ".$email.": 


    " .$message."

    ";

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    //Email response
    echo "We got your message! You'll hear back from us soon.";
  }
}
?>