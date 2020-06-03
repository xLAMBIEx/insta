<?php
  include "../inc.php";

  $query = "SELECT * FROM payments ORDER BY paymentDate DESC";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    $payments = [];
    while ($p = $result->fetch_array(MYSQLI_ASSOC)) {
      $payments[] = $p;
    }
    echo json_encode($payments);
  } else {
    echo "No Results";
  }
?>
