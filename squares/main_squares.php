<?php
/*
 * Program Name..: main_squares.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 * Description...: Print all 100 squares for fundraising
 */
include('../preload.php');

include(INCLUDES . 'squares.php');

include(HTML . 'beginHTML.php');

include('full_title.php');
?>

<div class="container-fluid">
  <form method="get" name="submitForm" action="requestSquare.php">
  <?php include('input_hidden.php'); ?>
  <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
  <?php $squares->printSquares(); /* Print 100 Squares */ ?>
  </table>
  <input type="hidden" name="boxSelected" id="boxSelected">
  </form>
</div>

<?php include(HTML . 'endHTML.php'); ?>
