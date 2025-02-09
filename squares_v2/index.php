<?php
include('../preload.php');

include(CLASSES . 'squares_v2.class.php');
$squares = new Squares();

$box_area = $squares->GetBoxAreas();

include(HTML . 'beginHTML_v2.php');
?>

<div class="container-fluid">
  <button type="button" id="hide_top_area">Hide Top Area</button>
  <?php
  // Square Title
  include('square_info.php');

  echo '*' . $squares->GetTotalSquares() . '*<br/>';

  // 100 square boxes
  include('square_boxes.php');
  ?>
</div>

<?php include(HTML . 'endHTML_v2.php'); ?>
