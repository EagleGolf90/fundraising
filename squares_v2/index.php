<?php
include('../preload.php');
include(CLASSES . 'squares_v2.class.php');
$squares = new Squares();

include(HTML . 'beginHTML_v2.php');
?>

<div class="container-fluid">
  <?php include('square_boxes.php'); ?>
</div>

<?php include(HTML . 'endHTML_v2.php'); ?>
