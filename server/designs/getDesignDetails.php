<?php
  include "../inc.php";

  if (isset($_GET['designId']) && !empty($_GET['designId'])) {
    $designId = $_GET['designId'];

    $stmt = $db->prepare("SELECT * FROM designs WHERE id = ?");
    $stmt->bind_param("i", $designId);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $design = $result->fetch_array(MYSQLI_ASSOC);

      $designSize = $design['size'];

      $query = "SELECT * FROM pricing";
      $p_result = $db->query($query);

      $designPrice = 0;
      while ($p = $p_result->fetch_array(MYSQLI_ASSOC)) {
        if ($designSize >= $p['size'] - 300 && $designSize <= $p['size']) {
          $designPrice = $p['price'] * $design['size'];
        }
      }

      $design['price'] = number_format( sprintf( "%.2f", round($designPrice, -2) ), 2, '.', '' );

      echo json_encode($design);
    } else {
      echo "No Results";
    }
  } else {
    echo "Invalid Parameter";
  }
?>
