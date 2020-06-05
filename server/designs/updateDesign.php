<?php
  include '../inc.php';

  if (isset($_POST['designId']) && !empty($_POST['designId']) &&
      isset($_POST['title']) && !empty($_POST['title']) &&
      isset($_POST['description']) && !empty($_POST['description']) &&
      isset($_POST['including']) && !empty($_POST['including']) &&
      isset($_POST['size']) && !empty($_POST['size']) &&
      isset($_POST['bedrooms']) && !empty($_POST['bedrooms']) &&
      isset($_POST['bathrooms']) && !empty($_POST['bathrooms']) &&
      isset($_POST['floors']) && !empty($_POST['floors']) &&
      isset($_POST['garage']) && !empty($_POST['garage']) &&
      isset($_POST['kitchen']) && !empty($_POST['kitchen']) &&
      isset($_POST['lounge']) && !empty($_POST['lounge']) &&
      isset($_POST['dining']) && !empty($_POST['dining']) &&
      isset($_POST['patio']) && !empty($_POST['patio']) &&
      isset($_POST['width']) && !empty($_POST['width']) &&
      isset($_POST['depth']) && !empty($_POST['depth']) &&
      isset($_POST['price']) && !empty($_POST['price']) &&
      isset($_POST['featuredImage']) && !empty($_POST['featuredImage']) &&
      isset($_POST['image1']) && !empty($_POST['image1']) &&
      isset($_POST['image2']) && !empty($_POST['image2']) &&
      isset($_POST['image3']) && !empty($_POST['image3'])) {

        $designId = $_POST['designId'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $including = $_POST['including'];
        $size = $_POST['size'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];
        $floors = $_POST['floors'];
        $garage = $_POST['garage'];
        $kitchen = $_POST['kitchen'];
        $lounge = $_POST['lounge'];
        $dining = $_POST['dining'];
        $patio = $_POST['patio'];
        $width = $_POST['width'];
        $depth = $_POST['depth'];
        $price = $_POST['price'];
        $featuredImage = $_POST['featuredImage'];
        $image1 = $_POST['image1'];
        $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];

        $stmt = $db->prepare("UPDATE designs SET title=?, description=?, including=?, size=?, bedrooms=?, bathrooms=?, floors=?, garage=?, kitchen=?, lounge=?, dining=?, patio=?, width=?, depth=?, price=?, featuredImage=?, image1=?, image2=?, image3=? WHERE id=?");
        $stmt->bind_param("sssiiiiiiiiiiidssssi", $title, $description, $including, $size, $bedrooms, $bathrooms, $floors, $garage, $kitchen, $lounge, $dining, $patio, $width, $depth, $price, $featuredImage, $image1, $image2, $image3, $designId);

        $stmt->execute();

        echo "Design Updated";
  } else {
    echo "Invalid Parameter";
  }
?>
