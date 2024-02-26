<?php
include('../preload.php');

$bus_unit = $_GET['bu'];
include(INCLUDES. 'squares_payments.php');

$rows = $payment->loadPayments();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <h2 id="ctr">Payments for <?php echo $payment->getEventTitle(); ?> (<?php echo $bus_unit; ?>)</h2>
  <div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
    <tr>
      <td id="headerTitle" colspan="2"></td>
      <td id="headerTitle"><b>Full Name</b></td>
      <td id="headerTitle"><b>Square#</b></td>
      <td id="headerTitle"><b>Total Cost</b></td>
      <td id="headerTitle"><b>Paid?</b></td>
    </tr>
<?php
$totalPeoplePaids   = 0;
$totalPeopleUnPaids = 0;
$totalPaids   = 0;
$totalUnPaids = 0;
$totalPeople  = 0;
$totalDollars = 0;

foreach ($rows As $row) {
  $totalPeople += 1;
  $ownSquares = $payment->getOwnSquares($row['PersonID']);
  $totalDollars += $row['Total'];
  $bu_link = '&bu=' . $_GET['bu'];
  $edit_link = 'edit_squares.php?id=' . $row['PersonID'] . '&bu=' . $row['BusinessUnit'] . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . $bu_link;
  $delete_link = 'delete_row.php?id=' . $row['PersonID'] . '&bu=' . $row['BusinessUnit'] . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . $bu_link;
  $delete_link .= '&sq=' . $ownSquares;
?>
    <tr>
      <td><b><a class="btn btn-primary btn-block active" role="button" href="<?php echo $edit_link; ?>">Edit</a></b></td>
      <td><b><a class="btn btn-danger btn-block active" role="button" href="<?php echo $delete_link; ?>">Delete</a></b></td>
      <td><b><?php echo $row['NickName']; ?></b></td>
      <td><b><?php echo $ownSquares; ?></b></td>
      <td><b>$<?php echo $row['Total']; ?></b></td>
<?php
      if ($row['Paid'] == 'Y') {
        $totalPaids += $row['Total'];
        $totalPeoplePaids += 1;
      } else {
        $totalUnPaids += $row['Total'];
        $totalPeopleUnPaids += 1;
      }
      $receive_pay_link = 'receivePay.php?id=' . $row['PersonID'] . '&yr=' . $row['YearPick'] . '&event=' . $row['EventType'] . '&pool=' . $row['PoolNbr'] . '&paid=' . $row['Paid'] . $bu_link;
?>
      <td><b><a class="btn btn-primary btn-block active" role="button" href="<?php echo $receive_pay_link; ?>"><?php echo ($row['Paid'] == 'Y') ? 'Paid' : 'UnPaid'; ?></a></b></td>
    </tr>
<?php
    }
?>
    </table>

    <?php include(HTML . 'display_totals.php'); ?>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
