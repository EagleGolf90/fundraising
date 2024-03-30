<?php
include('../preload.php');

include(CLASSES . 'squares_winners.php');
$winner = new Square_Winners();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <h2 id="ctr"><?php echo BUS_UNIT; ?> List of Squares Winners</h2>

  <div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
    <tr>
      <td style="width:200px;" id="headerTitle"><b>Full Name</b></td>
      <td style="width:75px;" id="headerTitle"><b></b></td>
    </tr>
<?php
$round = 0;
$rows = $winner->loadWinners($round);
foreach ($rows As $row) {
?>
    <tr>
      <td><b><?php echo $row['NickName']; ?></b></td>
      <td><b><?php echo $row['Total']; ?></b></td>
    </tr>
<?php
}
?>
    </table>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
