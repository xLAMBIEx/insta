<?php
  include "../server/inc.php";

  if (!isset($_GET['did']) || empty($_GET['did'])) {
    header('Location: ../index.php');
  }

  $designId = $_GET['did'];

  $stmt = $db->prepare("SELECT * FROM designs WHERE id = ?");
  $stmt->bind_param("i", $designId);

  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $result = $result->fetch_assoc();

    $designSize = $result['size'];

    $query = "SELECT * FROM pricing";
    $p_result = $db->query($query);

    $designPrice = 0;
    while ($p = $p_result->fetch_array(MYSQLI_ASSOC)) {
      if ($designSize >= $p['size'] - 300 && $designSize <= $p['size']) {
        $designPrice = $p['price'] * $result['size'];
      }
    }

    $result['price'] = round($designPrice, -2);
  } else {
    header('Location: ../index.php');
  }

  $cartTotal = $result["price"];

  $discount = false;
  $discountText = '';

  if ($result['discount'] === "yes") {
    $discount = true;
    $discountText = ' (15% Discount)';

    $originalAmount = $cartTotal;
    $cartTotal = $cartTotal * ((100-15) / 100);
  }

  $data = array(
      'merchant_id' => '15192334',
      'merchant_key' => 'm7b9w2gadc2ai',
      'return_url' => 'https://www.instaplan.co.za/payment/success.php',
      'cancel_url' => 'https://www.instaplan.co.za/payment/cancel.php',
      'notify_url' => 'https://www.instaplan.co.za/payment/itn.php',
      'm_payment_id' => '1212',
      'amount' => number_format( sprintf( "%.2f", $cartTotal ), 2, '.', '' ),
      'item_name' => $result["title"] . $discountText,
      'item_description' => $result["including"],
      'custom_int1' => '2121',
      'custom_str1' => 'Instaplan Payment'
  );

  $pfOutput = '';
  foreach( $data as $key => $val ) {
      if(!empty($val)) {
          $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
       }
  }
  $getString = substr( $pfOutput, 0, -1 );

  // $passPhrase = ''; - Change on Live
  if( isset( $passPhrase ) ) {
      $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
  }

  $data['signature'] = md5( $getString );

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instaplan - Checkout</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS Link -->
    <link rel="stylesheet" href="../styles/main.css">
  </head>
  <body>
    <div class="wrap-content container">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white bg-light px-5 mb-5 pb-2 border-bottom">
        <a class="navbar-brand mx-auto" href="../index.php">
          <img src="../media/logo/logo.png" width="125" height="125" class="d-inline-block align-top" alt="Logo">
        </a>
      </nav>

      <!-- Spacer -->
      <!-- <div class="m-1 p-1"></div> -->

      <div class="row my-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-center">Checkout</h1>
          <hr>

          <p class="text-center mb-4">
            You will be redirected to the PayFast payment gateway to complete the
            transaction, please make sure to enter the correct contact information.
            Your design files will be sent to you via email shortly after your payment
            is complete.
          </p>

          <!--
          <div class="my-5 text-center">
            <h4>R6999.00</h4>
            <label class="d-block text-muted">Design #802</label>
            <div class="my-3">+</div>
            <h4>R99.00</h4>
            <label class="d-block text-muted">Transaction Fee</label>
          </div>
          <hr>
          -->

          <?php if ($discount == true) : ?>
            <p class="text-muted text-center m-0 p-0">was R<?php echo $originalAmount; ?></p>
          <?php endif; ?>
          <h2 class="text-center mb-3">R<?php echo $data['amount']; ?></h2>

          <label class="d-block text-center text-muted"><?php echo $data['item_name']; ?></label>
          <p class="text-center text-muted">
            <strong>Including:</strong> <?php echo $data['item_description']; ?>
          </p>
          <hr>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="acceptCheckbox">
            <label class="form-check-label" for="acceptCheckbox">Accept <a href="https://www.instaplan.co.za/legal/cookies-policy.php" target="_blank">Terms and Conditions</a>, <a href="https://www.instaplan.co.za/legal/privacy-policy.php" target="_blank">Privacy Policy</a> and <a href="https://www.instaplan.co.za/legal/refund-and-exchange-policy.php" target="_blank">Refund Policy</a>.</label>
          </div>

          <?php
            $testingMode = false;
            $pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
            $htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post">';
            foreach($data as $name=> $value)
            {
              $htmlForm .= '<input name="'.$name.'" type="hidden" value="'.$value.'" />';
            }
            $htmlForm .= '<input id="accepted" class="btn btn-block btn-outline-secondary mt-2" type="submit" value="Pay Now" disabled /></form>';
            echo $htmlForm;
          ?>

          <?php if ($discount == true) : ?>
            <p class="mt-5 p-4 text-center border shadow">
              <strong>Dear Client</strong> <br><br>
              As you will be the first to purchase this House Plan/Design, you will enjoy the benefit of a
              15% discount. Please note that this House Plan/Design will be processed and
              delivered once completed. Please allow at least a three week lead time. If you
              do not wish to utilize the discount in lieu of receiving your House Plan/Design
              immediately, kindly browse any other design which may be ready for delivery
              immediately (these House Plans/Designs unfortunately do not qualify for
              discount). Thank you.
            </p>
          <?php endif; ?>

        </div>
        <div class="col-md-3"></div>
      </div>
      
      <footer class="text-secondary py-4 mt-5 border-top">
        <div class="row">
            <div class="col-md-8 text-left">
                Copyright © 2020 Instaplan | 
                <a href="https://www.instaplan.co.za/legal/privacy-policy.php" class="text-secondary font-weight-bold">Privacy Policy</a> - 
                <a href="https://www.instaplan.co.za/legal/cookies-policy.php" class="text-secondary font-weight-bold">Cookies Policy</a> - 
                <a href="https://www.instaplan.co.za/legal/refund-and-exchange-policy.php" class="text-secondary font-weight-bold">Refund & Exchange Policy</a>
            </div>
            <div class="col-md-4 text-right">
                Powered by <a href="https://www.allaboutcloud.co.za" class="text-secondary font-weight-bold" target="_blank">All About Cloud</a>
            </div>
        </div>
      </footer>
      
    </div>

    <!-- JQuery, Popper, Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Main JS Link -->
    <script src="../scripts/main.js"></script>
  </body>
</html>
