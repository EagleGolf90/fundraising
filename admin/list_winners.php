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
      <td style="width:75px;" id="headerTitle"><b>Rounds</b></td>
      <td style="width:100px;" id="headerTitle"><b>Winning Team</b></td>
      <td style="width:75px;" id="headerTitle"><b>Score</b></td>
      <td style="width:100px;" id="headerTitle"><b>Losing Team</b></td>
      <td style="width:75px;" id="headerTitle"><b>Score</b></td>
      <td style="width:100px;" id="headerTitle"><b>Name</b></td>
      <td style="width:75px;" id="headerTitle"><b>Cost</b></td>
    </tr>
<?php
$rows = $winner->listSquareWinners();
foreach ($rows As $row) {
?>
    <tr>
      <td><b><?php echo $row['Rounds']; ?></b></td>
      <td><b><?php echo $row['WinningTeam']; ?></b></td>
      <td><b><?php echo $row['TopScore']; ?></b></td>
      <td><b><?php echo $row['LosingTeam']; ?></b></td>
      <td><b><?php echo $row['LeftScore']; ?></b></td>
      <td><b><?php echo $row['NickName']; ?></b></td>
      <td><b><?php echo $row['Cost']; ?></b></td>
    </tr>
<?php
}
?>
    </table>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
