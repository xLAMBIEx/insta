<?php
  include '../inc.php';

  if (isset($_POST['username']) && !empty($_POST['username']) &&
      isset($_POST['password']) && !empty($_POST['password']) &&
      isset($_POST['emailacc']) && !empty($_POST['emailacc'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $emailacc = $_POST['emailacc'];

        $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $emailacc);

        $stmt->execute();

        echo "User Added";
  } else {
    echo "Invalid Parameter";
  }
?>
