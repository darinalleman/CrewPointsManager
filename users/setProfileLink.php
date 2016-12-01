<?php
  // is the user logged in? yes - home, no - ask them to login
  require_once('functions.php');
  secureSession();

  if( !isLoggedIn() )
  {
    echo '<li><a onclick=location.href="/webprog29/users/login_page.php"><i class="material-icons left">account_circle</i>Log In</a></li>';
  } else
  {
    echo '<li><a onclick="location.href="/webprog29/users/home.php""><i class="material-icons left">account_circle</i>Profile</a></li>';
  }
?>
