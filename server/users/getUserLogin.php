<?php
  include "../inc.php";

  if (isset($_POST['username']) && !empty($_POST['username']) &&
      isset($_POST['password']) && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
          $user = $result->fetch_array(MYSQLI_ASSOC);
          echo json_encode(['status' => 'Success', 'body' => $user]);
        } else {
          echo json_encode(['status' => 'Invalid Information']);
        }
  } else {
    echo json_encode(['status' => 'Invalid Parameter']);
  }
?>
