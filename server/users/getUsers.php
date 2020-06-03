<?php
  include "../inc.php";

  $query = "SELECT * FROM users";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    $users = [];
    while ($u = $result->fetch_array(MYSQLI_ASSOC)) {
      $users[] = $u;
    }
    echo json_encode($users);
  } else {
    echo "No Results";
  }
?>
