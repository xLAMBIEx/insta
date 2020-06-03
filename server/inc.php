<?php
  // Database Connection Paramters
  $live = false; // Change on live

  if ($live === true) {
    $DBServ = "localhost";
    $DBUser = "instaprw_wp244";
    $DBPass = "CGssfy,!PyW4";
    $DBName = "instaprw_wp244";
  } else {
    $DBServ = "localhost";
    $DBUser = "root";
    $DBPass = "";
    $DBName = "instaplan";
  }

  // Create Database Connection
  $db = new mysqli($DBServ, $DBUser, $DBPass, $DBName);

  // Check Database Connection
  if ($db->connect_error) {
    die("Database Connection Error: " . $db->connect_error);
  }
?>
