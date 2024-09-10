<?php
include('../preload.php');

$current_flag = false;
$yearPlayed = $_GET['YearPick'];
$eventType = $_GET['EventType'];
$poolNumber = $_GET['PoolNumber'];

include(INCLUDES . 'squares.php');

include(INCLUDES . 'contacts.php');

include(HTML . 'beginHTML.php');

include('full_title.php');
?>

<div class="container">
  <h2 id="ctr">You selected Square box # <?php echo $_GET['boxSelected']; ?></h2>
  <h3 id="ctr">
    <?php
    $zelle_flag = $main_contact->getZelleFlag();
    $cashApp_flag = $main_contact->getCashAppFlag();
    $payment_app = '';
    $payment_label = '';
    if ($cashApp_flag == 'Y') {
      $payment_app = $main_contact->getMainCashApp();
      $payment_label = 'CashApp';
    }
    if ($zelle_flag == 'Y') {
      $payment_app = $main_contact->getMainZelle();
      $payment_label = 'Zelle';
    }
    $deadline = $main_contact->getDeadline();
    echo $squares->calculateAmounts($payment_app, $payment_label, $deadline);
    ?>
  </h3>

  <div class="form-style-10">
    <h1>Register <?php echo $squares->getEventTitle(); ?></h1>
    <form action="sendSquare.php" method="POST" name="submitForm">
      <input type="hidden" name="BoxNumber" value="<?php echo $_GET['boxSelected']; ?>" />
      <?php include(INCLUDES . 'input_hidden.php'); ?>
      <div class="section"><span>1</span>Full Name or NickName</div>
      <div class="inner-wrap">
        <label><input type="text" name="nickName" id="nickName" required /></label>
      </div>

      <div class="section"><span>2</span>Email</div>
      <div class="inner-wrap">
        <label><input type="email" name="email" id="email" required /></label>
      </div>

      <div class="button-section">
       <button type="submit" name="SignUp" id="SignUp" class="btn btn-primary btn-lg fcc-btn">Submit</button>
       <span class="privacy-policy">
         <input type="checkbox" name="terms" class="terms">You agree to our Terms.
       </span>
      </div>
    </form>
  </div>
  <div class="form-style-10 text-center">
    <form action="main_squares.php" method="POST">
      <?php include(INCLUDES . 'input_hidden.php'); ?>
      <button type="submit" class="btn btn-primary btn-log fcc-btn">Cancel and return to Squares</button>
    </form>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
