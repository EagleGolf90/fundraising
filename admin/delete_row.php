<?php
include('../preload.php');
include(HTML . 'beginHTML.php');

$fullName = '';
$sqlTable = new SQLTable();
$rows = $sqlTable->load('loadParticipants', array(BUS_UNIT, $_GET['id']));
foreach ($rows as $row) {
  $fullName = $row['FirstName'] . ' ' . $row['LastName'];
}
?>

<div class="container">
  <h2 id="ctr">Name: <?php echo $fullName; ?></h2>

  <div class="form-style-10">
    <form action="delete_squares.php" method="post">
      <input type="hidden" name="bu" value="<?php echo $_GET['bu']; ?>" />
      <input type="hidden" name="yr" value="<?php echo $_GET['yr']; ?>" />
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
      <input type="hidden" name="event" value="<?php echo $_GET['event']; ?>" />
      <input type="hidden" name="pool" value="<?php echo $_GET['pool']; ?>" />
      <input type="hidden" name="saved_squares" value="<?php echo $_GET['sq']; ?>">

      <h3>Square(s): <?php echo $_GET['sq']; ?></h3>
      <p><input type="checkbox" name="confirm" class="confirm" value="yes"> Are you sure you want to delete Square(s)?</p>
      <br/>
      <div class="button-section">
        <input type="submit" name="Delete" id="Delete" class="ui-btn ui-btn-inline">
      </div>
    </form>
  </div>

  <div class="text-center"><a href="payments.php?bu=<?php echo $_GET['bu']; ?>">Go back to Payments</a></div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
