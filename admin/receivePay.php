<?php
include('../preload.php');

include(HTML . 'beginHTML.php');

include(INCLUDES . 'squares_payments.php');

$payment->getInfo();
?>

<div class="container">
  <h2 id="ctr">Name: <?php echo $payment->getName(); ?></h2>

  <div class="form-style-10">
    <form action="update_payments.php" method="post">
      <input type="hidden" name="bu" value="<?php echo $_GET['bu']; ?>" />
      <input type="hidden" name="PersonID" value="<?php echo $_GET['id']; ?>" />
      <input type="hidden" name="YearPick" value="<?php echo $_GET['yr']; ?>" />
      <input type="hidden" name="EventType" value="<?php echo $_GET['event']; ?>" />
      <input type="hidden" name="PoolNumber" value="<?php echo $_GET['pool']; ?>" />
      <p><input type="checkbox" name="paid" class="paid" <?php if ($_GET['paid'] == 'Y') { echo 'checked'; }?>> Did you receive money?</p>
      <br/>
      <div class="button-section">
        <input type="Submit" name="SignUp" id="SignUp" class="ui-btn ui-btn-inline">
      </div>
    </form>
  </div>

  <div class="text-center"><a href="payments.php?bu=<?php echo $_GET['bu']; ?>">Go back to Payments</a></div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
