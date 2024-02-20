<?php
include('../preload.php');

if (!isset($_GET['name'])) die('Parameter name must be provided. Please try again.');
$program_name = $_GET['name'];
include(INCLUDES . 'squares.php');
$bu = BUS_UNIT;

$rows = $squares->listSquares();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <?php
  $current_flag = true;
  include('list_squares.php');
  ?>
</div>

<table class="table">
<?php
foreach ($rows as $row) {
  $link = '<h2><a href="' . $program_name . '.php?bu=' . strtolower(BUS_UNIT) . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . '">';
  $link .= $row['EventDescription'] . '</a></h2>';
?>
  <tr>
    <td class="text-center"><?php echo $link; ?></td>
  </tr>
<?php
}
?>
</table>

<?php include(HTML . 'endHTML.php'); ?>
