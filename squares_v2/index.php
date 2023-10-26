<?php
include('../preload.php');
include(CLASSES . 'squares_v2.class.php');
$squares = new Squares();

$box_area = array("1st", "2nd", "3rd", "Final");

include(HTML . 'beginHTML_v2.php');
?>

<div class="container-fluid">
  <?php
  // Square Title
  include('square_info.php');

  // 100 square boxes
  include('square_boxes.php');
  ?>
</div>

<?php include(HTML . 'endHTML_v2.php'); ?>
