<?php
include('../preload.php');
include(CLASSES . 'squares_v2.class.php');
$squares = new Squares();

include(HTML . 'beginHTML_v2.php');
?>

<div class="container-fluid">
  <h1><?php echo strtoupper(BUS_UNIT); ?> Fundraising</h1>
  <h2><?php echo $squares->getFullInstructions(); ?></h2>
  <?php include('square_boxes.php'); ?>
</div>

<?php include(HTML . 'endHTML_v2.php'); ?>
