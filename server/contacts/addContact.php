<?php
  include '../inc.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../../vendor/autoload.php';

  if (isset($_POST['contactName']) && !empty($_POST['contactName']) &&
      isset($_POST['contactMail']) && !empty($_POST['contactMail']) &&
      isset($_POST['contactMesg']) && !empty($_POST['contactMesg'])) {

        $name = $_POST['contactName'];
        $email = $_POST['contactMail'];
        $mesg = $_POST['contactMesg'];

        $from = $email;
        $sendTo = 'support@instaplan.co.za';
        $subject = 'Instaplan - Contact Request';
        $fields = array('name' => $name, 'email' => $email, 'message' => $mesg);

        $okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
        $errorMessage = 'There was an error while submitting the form. Please try again later';

        $recaptchaSecret = '6LfAVwEVAAAAAD3BbIEwXxUlbXX1WjJ8SHkTIoho';

        // if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
        error_reporting(E_ALL & ~E_NOTICE);

        try {
          if (!empty($_POST)) {

              if (!isset($_POST['recaptcha'])) {
                  throw new \Exception('ReCaptcha is not set.');
              }
              
              $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
              
              $response = $recaptcha->verify($_POST['recaptcha'], $_SERVER['REMOTE_ADDR']);
    
              if (!$response->isSuccess()) {
                  throw new \Exception('ReCaptcha was not validated.');
              }
              
              $stmt = $db->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
              $stmt->bind_param("sss", $name, $email, $mesg);

              $stmt->execute();

              

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

              $mail->addAddress('support@instaplan.co.za', 'Support');

              // $query = "SELECT * FROM users";
              // $admins = $db->query($query);

              // while ($a = $admins->fetch_assoc()) {
              //   $mail->addAddress($a['email'], 'Instplan Admin User');
              // }

              $mail->addReplyTo('noreply@instaplan.co.za', 'No Reply');

              // Content
              $mail->isHTML(true);
              $mail->Subject = 'Instaplan - Contact Request';
              $mail->Body    = '<h1 style="text-align: center;color:#87b763;font-size:50px;">Instaplan</h1> <hr> <h2 style="color:#87b763;">Contact Request</h2><p>Hi, please contact this user: </p> <ul><li>' . $name . '</li><li>' . $email . '</li><li>' . $mesg . '</li></ul> <br> <br> <p>Kind Regards <br> Instaplan - Your Future, Your Plan</p>';
              $mail->AltBody = "Hello, please contact" . $name . " at " . $email . " for " . $mesg;

              $mail->send();
    
              echo "Contact Added";
          }
        } catch (\Exception $e) {
          echo "Invalid Parameter";
        }
  } else {
    echo "Invalid Parameter";
  }
?>
