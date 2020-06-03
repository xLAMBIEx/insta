<?php
  include "../inc.php";

  $query = "SELECT * FROM contacts ORDER BY contactDate DESC";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    $contacts = [];
    while ($c = $result->fetch_array(MYSQLI_ASSOC)) {
      $contacts[] = $c;
    }
    echo json_encode($contacts);
  } else {
    echo "No Results";
  }
?>
