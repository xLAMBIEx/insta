<?php
  include '../inc.php';

  if (isset($_POST['userId']) && !empty($_POST['userId']) &&
      isset($_POST['username']) && !empty($_POST['username']) &&
      isset($_POST['password']) && !empty($_POST['password']) &&
      isset($_POST['emailacc']) && !empty($_POST['emailacc'])) {

        $userId = $_POST['userId'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $emailacc = $_POST['emailacc'];

        $stmt = $db->prepare("UPDATE users SET username=?, password=?, email=? WHERE id=?");
        $stmt->bind_param("sssi", $username, $password, $emailacc, $userId);

        $stmt->execute();

        echo "User Updated";
  } else {
    echo "Invalid Parameter";
  }
?>
