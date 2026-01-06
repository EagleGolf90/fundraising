<?php
include('../preload.php');

include(INCLUDES. 'squares_payments.php');

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <h2 id="ctr"><?php echo BUS_UNIT; ?> Squares - List of Names</h2>
  <h3 id="ctr"><?php echo $payment->getEventTitle() . '<br/>Pool Number - ' . $payment->getPoolNumber(); ?></h3>

  <div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
    <tr>
      <td style="width:200px;" id="headerTitle"><b>Full Name</b></td>
      <td style="width:75px;" id="headerTitle"><b>Email</b></td>
      <td style="width:75px;" id="headerTitle"><b>Square#</b></td>
    </tr>
<?php
$rows = $payment->loadNames();
foreach ($rows As $row) {
?>
    <tr>
      <td><b><?php echo $row['FullName']; ?></b></td>
      <td><b><?php echo $row['EmailAddress']; ?></b></td>
      <td><b><?php echo $row['SquareNbr']; ?></b></td>
    </tr>
<?php
}
?>
    </table>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
