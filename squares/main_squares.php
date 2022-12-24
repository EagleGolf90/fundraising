<?php
/*
 * Program Name..: main_squares.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 * Description...: Print all 100 squares for fundraising
 */
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();
$yearPick = $squares->getYearPick();
$eventType = $squares->getEventType();
$poolNumber = $squares->getPoolNumber();

include(HTML . 'beginHTML.php');

include('event_title.php');
?>

<div class="container-fluid">
  <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
  <?php $squares->printSquares(); /* Print 100 Squares */ ?>
  </table>
  <div id="boxSelected"></div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
