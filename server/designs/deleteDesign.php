<?php
  include "../inc.php";

  if (isset($_POST['designId']) && !empty($_POST['designId'])) {
    $designId = $_POST['designId'];

    $stmt = $db->prepare("DELETE FROM designs WHERE id = ?");
    $stmt->bind_param("i", $designId);
    $stmt->execute();

    echo "Design Deleted";
  } else {
    echo "Invalid Parameter";
  }
?>
