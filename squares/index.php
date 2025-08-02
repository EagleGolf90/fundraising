<?php
include('../preload.php');

include(HTML . 'beginHTML.php');

$it_on_flag = strtolower($_GET['m']);
if (IT_FLAG == true && $it_on_flag != 'on') {
?>
<div class="container">
  <h1 class="text-center">IT is now working on a resolution and will be back online soon. Please come back in 30 minutes to one hour.</h1>
</div>
<?php
} else {
?>
<div class="container">
  <h1 class="text-center"><?php echo BUS_UNIT; ?> Squares Fundraising</h1>
  <?php
  $current_flag = true;
  include('list_squares.php');
  ?>
</div>

<?php
}

include(HTML . 'endHTML.php');
?>
