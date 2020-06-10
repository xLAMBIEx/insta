<?php
  include '../inc.php';

  if (isset($_POST['title']) && !empty($_POST['title']) &&
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
      isset($_POST['discount']) && !empty($_POST['discount']) &&
      isset($_POST['featuredImage']) && !empty($_POST['featuredImage'])) {

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
        $price = 0;
        $discount = $_POST['discount'];
        $featuredImage = $_POST['featuredImage'];
        
        if (isset($_POST['image1']) && !empty($_POST['image1'])) {
          $image1 = $_POST['image1'];
        } else {
          $image1 = '';
        }

        if (isset($_POST['image2']) && !empty($_POST['image2'])) {
          $image2 = $_POST['image2'];
        } else {
          $image2 = '';
        }

        if (isset($_POST['image3']) && !empty($_POST['image3'])) {
          $image3 = $_POST['image3'];
        } else {
          $image3 = '';
        }

        if (isset($_POST['image4']) && !empty($_POST['image4'])) {
          $image4 = $_POST['image4'];
        } else {
          $image4 = '';
        }

        if (isset($_POST['image5']) && !empty($_POST['image5'])) {
          $image5 = $_POST['image5'];
        } else {
          $image5 = '';
        }

        if (isset($_POST['image6']) && !empty($_POST['image6'])) {
          $image6 = $_POST['image6'];
        } else {
          $image6 = '';
        }

        if (isset($_POST['image7']) && !empty($_POST['image7'])) {
          $image7 = $_POST['image7'];
        } else {
          $image7 = '';
        }

        if (isset($_POST['image8']) && !empty($_POST['image8'])) {
          $image8 = $_POST['image8'];
        } else {
          $image8 = '';
        }

        if (isset($_POST['image9']) && !empty($_POST['image9'])) {
          $image9 = $_POST['image9'];
        } else {
          $image9 = '';
        }

        if (isset($_POST['image10']) && !empty($_POST['image10'])) {
          $image10 = $_POST['image10'];
        } else {
          $image10 = '';
        }

        if (isset($_POST['image11']) && !empty($_POST['image11'])) {
          $image11 = $_POST['image11'];
        } else {
          $image11 = '';
        }

        if (isset($_POST['image12']) && !empty($_POST['image12'])) {
          $image12 = $_POST['image12'];
        } else {
          $image12 = '';
        }

        $stmt = $db->prepare("INSERT INTO designs(title, description, including, size, bedrooms, bathrooms, floors, garage, kitchen, lounge, dining, patio, width, depth, price, discount, featuredImage, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10, image11, image12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiiiiiiiiiiidssssssssssssss", $title, $description, $including, $size, $bedrooms, $bathrooms, $floors, $garage, $kitchen, $lounge, $dining, $patio, $width, $depth, $price, $discount, $featuredImage, $image1, $image2, $image3, $image4, $image5, $image6, $image7, $image8, $image9, $image10, $image11, $image12);

        $stmt->execute();

        echo "Design Added";
  } else {
    echo "Invalid Parameter";
  }
?>
