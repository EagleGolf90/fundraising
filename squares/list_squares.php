<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$bu = BUS_UNIT;
$squares->loadSquares();

$rows = $squares->listSquares();
?>

<table class="table">
<?php
foreach ($rows as $row) {
  $link = '<h2><a href="index_form.php?bu=' . strtolower(BUS_UNIT) . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . '">';
  $link .= $row['EventDescription'] . '</a></h2>';
?>
  <tr>
    <td class="text-center"><?php echo $link; ?></td>
  </tr>
<?php
}
?>
</table>
