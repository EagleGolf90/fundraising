<?php
include('../preload.php');

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <h1 class="text-center">Squares Fundraising</h1>
  <?php
  $current_flag = true;
  include('list_squares.php');
  ?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
