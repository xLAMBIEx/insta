<?php
  include '../inc.php';

  /*
    Helper Function: Check if the query already contains a WHERE then
    add either WHERE or AND and the filter string
  */
  function addFilter($query, $filter) {
    if (strpos($query, 'WHERE') !== false) {
      return $query . " AND " . $filter;
    } else {
      return $query . " WHERE " . $filter;
    }
  }

  if (isset($_GET['filter']) && $_GET['filter'] == "true") {
    $query = "SELECT * FROM designs";
    $addWhere = true;

    // Size filter
    if (isset($_GET['size']) && $_GET['size'] != "any") {
      $minSize = $_GET['size'];
      $maxSize = $_GET['size'] + 300;
      $query = addFilter($query, "(size BETWEEN '$minSize' AND '$maxSize')");
    }

    // Bedroom filter
    if (isset($_GET['bedrooms']) && $_GET['bedrooms'] != "any") {
      $bedroomCount = $_GET['bedrooms'];
      $query = addFilter($query, "(bedrooms = '$bedroomCount')");
    }

    // Bathroom filter
    if (isset($_GET['bathrooms']) && $_GET['bathrooms'] != "any") {
      $bathroomCount = $_GET['bathrooms'];
      $query = addFilter($query, "(bathrooms = '$bathroomCount')");
    }

    // Floor filter
    if (isset($_GET['floors']) && $_GET['floors'] != "any") {
      $floorCount = $_GET['floors'];
      $query = addFilter($query, "(floors = '$floorCount')");
    }

    // Width filter
    if (isset($_GET['width']) && $_GET['width'] != "any") {
      $minWidth = $_GET['width'];
      $maxWidth = $_GET['width'] + 5;
      $query = addFilter($query, "(width BETWEEN '$minWidth' AND '$maxWidth')");
    }

    // Depth filter
    if (isset($_GET['depth']) && $_GET['depth'] != "any") {
      $minDepth = $_GET['depth'];
      $maxDepth = $_GET['depth'] + 5;
      $query = addFilter($query, "(depth BETWEEN '$minDepth' AND '$maxDepth')");
    }

    $result = $db->query($query);

    if ($result->num_rows > 0) {
      $designs = [];
      while ($design = $result->fetch_array(MYSQLI_ASSOC)) {
        $designs[] = $design;
      }
      echo json_encode($designs);
    } else {
      echo "No Results";
    }
  } else {
    $query = "SELECT * FROM designs";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
      $designs = [];
      while ($design = $result->fetch_array(MYSQLI_ASSOC)) {
        $designs[] = $design;
      }
      echo json_encode($designs);
    } else {
      echo "No Results";
    }
  }
?>
