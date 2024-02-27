<?php
include('../preload.php');

if (!isset($_GET['name'])) die('Parameter name must be provided. Please try again.');
$program_name = $_GET['name'];
$bus_unit = $_GET['bu'];
include(INCLUDES . 'squares.php');

$rows = $squares->listSquares();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <table class="table">
  <tr>
    <td class="text-center"><h1><?php echo $squares->getBusinessTitle(); ?></h1></td>
  </tr>
<?php foreach ($rows as $row) {
  $link = '<h2><a href="' . $program_name . '.php?bu=' . strtolower($row['BusinessUnit']) . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . '">';
  $link .= $row['EventDescription'] . ' (' . strtoupper($row['BusinessUnit']) . ')</a></h2>';
?>
    <tr>
      <td class="text-center"><?php echo $link; ?></td>
    </tr>
<?php } ?>
  </table>
</div>

<?php include(HTML . 'endHTML.php'); ?>
