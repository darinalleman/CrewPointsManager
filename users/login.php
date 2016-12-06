<?php
  // Nick Martinez - Final Project
  require_once('functions.php');
  require_once('user_gateway.php');

  secureSession();

  if( isset($_POST['login']) )
  {
    $safe_email = htmlentities($_POST['email']);
    $user = fetchUser($safe_email);
    if( !$user ) echo("Invalid username/password combination. <br />");
    if( password_verify($_POST['password'], $user['password']) )
    {
      $_SESSION['email'] = $safe_email;
      header('Location:../index.php');
    } else
    {
      echo("Invalid username/password combination. <br />");
    }
  }
?>
