<?php
  include "../inc.php";

  $query = "SELECT * FROM pricing";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    $prices = [];
    while ($p = $result->fetch_array(MYSQLI_ASSOC)) {
      $prices[] = $p;
    }
    echo json_encode($prices);
  } else {
    echo "No Results";
  }
?>
