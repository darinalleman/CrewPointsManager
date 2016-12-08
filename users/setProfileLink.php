<?php
  // Darin Alleman
  // is the user logged in? yes - home, no - ask them to login
  require_once('functions.php');
  secureSession();

  if(!isLoggedIn())
  {
    $location = 'location.href="/webprog29/users/login_page.php"';
    echo '<li><a onclick='.$location.'><i class="material-icons left">account_circle</i>Log In</a></li>';
  } else
  {
    $location = 'location.href="/webprog29/users/home.php"';
    echo '<li><a onclick='.$location.'><i class="material-icons left">account_circle</i>Profile</a></li>';
  }
?>
