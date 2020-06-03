<?php
  include '../inc.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if (isset($_POST['contactName']) && !empty($_POST['contactName']) &&
      isset($_POST['contactMail']) && !empty($_POST['contactMail']) &&
      isset($_POST['contactMesg']) && !empty($_POST['contactMesg'])) {

        $name = $_POST['contactName'];
        $email = $_POST['contactMail'];
        $mesg = $_POST['contactMesg'];

        $stmt = $db->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $mesg);

        $stmt->execute();

        require '../../vendor/autoload.php';

        $mail = new PHPMailer(true);
        //Server settings
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
        $mail->Subject = 'Instaplan - Contact Request';
        $mail->Body    = '<h1 style="text-align: center;color:#87b763;font-size:50px;">Instaplan</h1> <hr> <h2 style="color:#87b763;">Contact Request</h2><p>Hi, please contact this user: </p> <ul><li>' . $name . '</li><li>' . $email . '</li><li>' . $mesg . '</li></ul> <br> <br> <p>Kind Regards <br> Instaplan - Your Future, Your Plan</p>';
        $mail->AltBody = "Hello, please contact" . $name . " at " . $email . " for " . $mesg;

        $mail->send();

        echo "Contact Added";
  } else {
    echo "Invalid Parameter";
  }
?>
