<?php
  include "../inc.php";

  if (isset($_GET['designId']) && !empty($_GET['designId'])) {
    $designId = $_GET['designId'];

    $stmt = $db->prepare("SELECT * FROM designs WHERE id = ?");
    $stmt->bind_param("i", $designId);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      echo json_encode($result->fetch_array(MYSQLI_ASSOC));
    } else {
      echo "No Results";
    }
  } else {
    echo "Invalid Parameter";
  }
?>
