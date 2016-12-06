<?php
  // Nick Martinez - Final Project
  // This script updates a user's information in the database.
  require_once('functions.php');
  require_once('user_gateway.php');

  $safe_email = htmlentities($_POST['edit_email']);
  updateUser($safe_email, $_POST['edit_password']);
  header('Location:home.php');
?>
