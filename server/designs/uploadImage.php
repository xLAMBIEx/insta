<?php
  $filename = $_FILES['file']['name'];

  $location = "../../media/designs/".$filename;
  $uploadOk = 1;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

  $valid_extensions = array("jpg");
  if( !in_array(strtolower($imageFileType), $valid_extensions) ) {
    $uploadOk = 0;
  }

  $filename = mt_rand(100000, 999999);
  $location = "../../media/designs/" . $filename . ".jpg";

  if ($uploadOk == 0) {
    echo "error";
  } else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
      echo $filename;
    } else {
      echo "error";
    }
  }
?>
