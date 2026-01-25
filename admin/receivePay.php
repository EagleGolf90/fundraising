<?php
include('../preload.php');

include(HTML . 'beginHTML.php');

include(INCLUDES . 'squares_payments.php');

$url_link = 'https://kdga.org/fundraising/admin/lists.php?name=payments&bu=' . strtolower($_GET['bu']);

$payment->getInfo();
?>

<div class="container">
  <h2 id="ctr">Name: <?php echo $payment->getName(); ?></h2>

  <div class="form-style-10">
    <form action="update_payments.php" method="post">
      <input type="hidden" name="bu" value="<?php echo $_GET['bu']; ?>" />
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
      <input type="hidden" name="yr" value="<?php echo $_GET['yr']; ?>" />
      <input type="hidden" name="event" value="<?php echo $_GET['event']; ?>" />
      <input type="hidden" name="pool" value="<?php echo $_GET['pool']; ?>" />

      <!-- Form Sections: Begin -->
      <div class="section"><span>1</span>Instruction</div>
      <div class="inner-wrap">
        <label><input type="checkbox" name="paid" class="paid" <?php if ($_GET['paid'] == 'Y') { echo 'checked'; }?>> Did you receive money?</label>
      </div>

      <?php include(INCLUDES . 'payment_type.php'); ?>
      <!-- Form Sections: End -->

      <br/>
      <div class="button-section">
        <input type="Submit" name="SignUp" id="SignUp" class="ui-btn ui-btn-inline">
      </div>
    </form>
  </div>

  <div class="text-center"><a href="<?php echo $url_link; ?>">Go back to Payments</a></div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
