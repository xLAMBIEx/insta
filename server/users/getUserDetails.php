<?php
  include "../inc.php";

  if (isset($_GET['userId']) && !empty($_GET['userId'])) {
    $userId = $_GET['userId'];

    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

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
