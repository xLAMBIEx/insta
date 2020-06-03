<?php
  include "../inc.php";

  if (isset($_POST['userId']) && !empty($_POST['userId'])) {
    $userId = $_POST['userId'];

    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    echo "User Deleted";
  } else {
    echo "Invalid Parameter";
  }
?>
