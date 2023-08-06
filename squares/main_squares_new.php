<?php
/*
 * Program Name..: main_squares.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 * Description...: Print all 100 squares for fundraising
 * 
 * Date Modified.: March 22, 2023
 */
include('../preload.php');

include(CLASSES . 'squares_new.class.php');
$squares = new Squares();
$yearPick = $squares->getYearPick();
$eventType = $squares->getEventType();
$poolNumber = $squares->getPoolNumber();
$showNames = $squares->getShowNames();
$draw_numbers = $squares->getDrawNumbers();

include(HTML . 'beginHTML.php');

include('event_title.php');
?>

<div class="container-fluid">
  <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
  <?php
  include('top_area.php');
  include('square_boxes.php');
  ?>
  </table>
  <?php include('instruction_footer.php'); ?>
  <div id="boxSelected"></div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
