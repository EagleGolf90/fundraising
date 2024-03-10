<?php
/*
 * Program Name..: main_squares.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 * Description...: Print all 100 squares for fundraising
 */
include('../preload.php');

$current_flag = false;
if (isset($_POST)) {
  $bus_unit = $_POST['bu'];
  $yearPlayed = $_POST['YearPick'];
  $eventType = $_POST['EventType'];
  $poolNumber = $_POST['PoolNumber'];
} else {
  $bus_unit = $_GET['bu'];
  $yearPlayed = $_GET['yr'];
  $eventType = $_GET['event'];
  $poolNumber = $_GET['pool'];  
}
include(INCLUDES . 'squares.php');

include(HTML . 'beginHTML.php');

include('full_title.php');
?>

<div class="container-fluid">
  <form method="get" name="submitForm" action="requestSquare.php">
  <?php include(INCLUDES . 'input_hidden.php'); ?>
  <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
  <?php $squares->printSquares(); /* Print 100 Squares */ ?>
  </table>
  <input type="hidden" name="boxSelected" id="boxSelected">
  </form>
</div>

<?php include(HTML . 'endHTML.php'); ?>
