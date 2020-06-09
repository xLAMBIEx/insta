<?php
  include '../inc.php';

  if (isset($_POST['price300']) && !empty($_POST['price300']) &&
      isset($_POST['price600']) && !empty($_POST['price600']) &&
      isset($_POST['price900']) && !empty($_POST['price900'])) {

        $price300 = $_POST['price300'];
        $price600 = $_POST['price600'];
        $price900 = $_POST['price900'];

        $stmt = $db->prepare("UPDATE pricing SET price=? WHERE size=?");

        $size = '300';
        $stmt->bind_param("is", $price300, $size);
        $stmt->execute();

        $size = '600';
        $stmt->bind_param("is", $price600, $size);
        $stmt->execute();

        $size = '900';
        $stmt->bind_param("is", $price900, $size);
        $stmt->execute();

        echo "Pricing Updated";
  } else {
    echo "Invalid Parameter";
  }
?>
