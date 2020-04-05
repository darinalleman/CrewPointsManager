<?php
  // Darin Alleman
  // is the user logged in? yes - home, no - ask them to login
  require_once('functions.php');
  secureSession();

  if(!isLoggedIn())
  {
    $location = 'location.href="users/login_page.php"';
    echo '<li><a onclick='.$location.'>Log In</a></li>';
  } else
  {
    $location = 'location.href="users/home.php"';
    echo '<li><a onclick='.$location.'>Profile</a></li>';
  }
?>
