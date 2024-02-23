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
  <table class="table">
  <tr>
    <td class="text-center"><h1><?php echo $squares->getBusinessUnitTitle(); ?></h1></td>
  </tr>
<?php foreach ($rows as $row) {
  $link = '<h2><a href="' . $program_name . '.php?bu=' . strtolower(BUS_UNIT) . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . '">';
  $link .= $row['EventDescription'] . '</a></h2>';
?>
    <tr>
      <td class="text-center"><?php echo $link; ?></td>
    </tr>
<?php } ?>
  </table>
</div>

<?php include(HTML . 'endHTML.php'); ?>
