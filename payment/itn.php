<?php
  header('HTTP/1.0 200 OK');
  flush();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $pfData = $_POST;

  // Database Connection Paramters
  $DBServ = "localhost";
  $DBUser = "instaprw_wp244";
  $DBPass = "CGssfy,!PyW4";
  $DBName = "instaprw_wp244";

  // Create Database Connection
  $db = new mysqli($DBServ, $DBUser, $DBPass, $DBName);

  // Check Database Connection
  if ($db->connect_error) {
    die("Database Connection Error: " . $db->connect_error);
  }

  if($pfData['payment_status'] == 'COMPLETE') {
    $m_payment_id = $pfData['m_payment_id'];
    $pf_payment_id = $pfData['pf_payment_id'];
    $token = $pfData['token'];

    $buyerName = $pfData['name_first'] + " " + $pfData['name_last'];
    $buyerEmail = $pfData['email_address'];
    $merchant = $pfData['m_payment_id'];
    $payment = $pfData['pf_payment_id'];
    $status = $pfData['payment_status'];
    $item = $pfData['item_name'];
    $description = $pfData['description'];
    $gross = $pfData['amount_gross'];
    $fee = $pfData['amount_fee'];
    $net = $pfData['amount_net'];

    $query = "INSERT INTO payments (buyerName, buyerEmail, merchant, payment, status, item, description, gross, fee, net) " .
             "VALUES ('$buyerName', '$buyerEmail', '$merchant', '$payment', '$status', '$item', '$description', '$gross', '$fee', '$net')";
    $db->query($query);

    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'mail.instaplan.co.za';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noreply@instaplan.co.za';
    $mail->Password   = 'PGAR~GOryPqZ';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('noreply@instaplan.co.za', 'Instaplan');

    $query = "SELECT * FROM users";
    $admins = $db->query($query);

    while ($a = $admins->fetch_assoc()) {
      $mail->addAddress($a['email'], 'Instplan Admin User');
    }

    $mail->addReplyTo('noreply@instaplan.co.za', 'No Reply');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Instaplan - Purchase';
    $mail->Body    = '<h1 style="text-align: center;color:#87b763;font-size:50px;">Instaplan</h1> <hr> <h2 style="color:#87b763;">New Purchase</h2><p>Hi, this user just bought a design. Please process the order: </p> <ul><li>' . $buyerName . '</li><li>' . $buyerEmail . '</li><li>' . $item . '</li> <li>' . $description . '</li> <li>' . $gross . '</li></ul> <br> <br> <p>Kind Regards <br> Instaplan - Your Future, Your Plan</p>';
    $mail->AltBody = "Hello, please process the new purchase.";

    $mail->send();
  }
?>
