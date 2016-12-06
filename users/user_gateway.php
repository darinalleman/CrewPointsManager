<?php
  // Nick Martinez - Final Project
  // This is a table data gateway for the User table in the webprog29
  // database. It supports normal CRUD functions.
  require_once('../db_info/config.php');

  /**
   * Establishes a database connection.
   * Returns a database connection handle.
   */
  function getConnection() {
    try {
      $db_host = 'webprog.cs.ship.edu';
      $db = 'webprog29';
      $db_handle = new PDO("mysql:host=$db_host;dbname=$db", $usernameStored,
        $passwordStored);
      $db_handle->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(PDOException $e) {
      echo $e->getMessage();
    }

    return $db_handle;
  }

  /**
   * Creates User table.
   */
  function createUserTable() {
    try {
        $db_handle = getConnection();
        $sql = "CREATE TABLE User (
          id int NOT NULL PRIMARY KEY AUTOINCREMENT,
          email VARCHAR(128) NOT NULL,
          password VARCHAR(128) NOT NULL,
          team int NOT NULL,
          FOREIGN KEY (team) REFERENCES TEAMS(id)
        )";
        $db_handle->exec($sql);
        $db_handle = null;
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  /**
   * Inserts a row into the User table.
   */
  function insertUser($email, $password, $team) {
    try {
      $db_handle = getConnection();
      $stmt = $db_handle->prepare("INSERT INTO User (email, password, team)
        VALUES (:email, :password, :team)");
      $data = array('email' => $email, 'password' => $password, 'team' => $team);
      $stmt->execute($data);
      $db_handle = null;
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  /**
   * Updates a row in the User table by email.
   */
  function updateUser($email, $new_password) {
    try {
      $db_handle = getConnection();
      $stmt = $db_handle->prepare("UPDATE User
        SET password = :password
        WHERE email = :email");
      $data = array('email' => $email, 'password' => $new_password);
      $stmt->execute($data);
      $db_handle = null;
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  /**
   * Fetches a row from the User table by email.
   * Returns the record fetched as a User object.
   */
  function fetchUser($email) {
    try {
      $db_handle = getConnection();
      $stmt = $db_handle->prepare("SELECT * FROM User WHERE email = :email");
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $db_handle = null;
      return $row;
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  /**
   * Fetches all rows from the User table.
   * Returns the record set of all records fetched.
   */
  function fetchAllUsers() {
    try {
      $db_handle = getConnection();
      $stmt = $db_handle->query("SELECT * FROM User");
      $record_set = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $db_handle = null;
      return $record_set;
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
?>
