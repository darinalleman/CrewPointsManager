<?php
  require_once('user_gateway.php');

  addUser("lee@webprog29.com", "Professor1");
  addUser("girard@webprog29.com", "Professor2");
  addUser("wellington@webprog29.com", "Professor3");
  addUser("armstrong@webprog29.com", "Professor4");

  function addUser($email, $password)
  {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    insertUser($email, $hashed_password);
  }
 ?>
