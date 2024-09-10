<?php
$bus_unit = BUS_UNIT;
include(INCLUDES . 'squares.php');
$squares->loadSquares();

$rows = $squares->listSquares();
?>

<table class="table">
<?php
foreach ($rows as $row) {
  $queryString = '?bu=' . strtolower($row['BusinessUnit']) . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'];
  $link = '<h2><a href="index_form.php' . $queryString . '">';
  $link .= $row['BusinessUnit_Title'] . '</a></h2>';
?>
  <tr>
    <td class="text-center"><?php echo $link; ?></td>
  </tr>
<?php
}
?>
</table>
