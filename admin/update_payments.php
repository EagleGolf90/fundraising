<?php
include('../preload.php');

$sqlTable = new SQLTable();
$paid = ($_POST['paid'] == 'on') ? 'Y' : 'N';

$bus_unit = strtoupper($_POST['bu']);
$personID = $_POST['id'];

// Add or update payment info
$parm = array($bus_unit, $personID, $paid);
$ret = $sqlTable->execute('updatePayments', $parm);

// Add or update payment type info
$parm = array($bus_unit, $_POST['yr'], $_POST['event'], $_POST['pool'], $personID, $_POST['paymentType'], $_POST['userName']);
$rows = $sqlTable->load('checkPaymentTypes', $parm);

$total = 0;
foreach ($rows as $row) $total = $row['Total'];

if ($total == 0) {
  // New payment type info
  $ret = $sqlTable->execute('insertPaymentTypes', $parm);
} else {
  // Existing payment type info
  $ret = $sqlTable->execute('updatePaymentTypes', $parm);
}

$link_main = '&yr=' . $_POST['yr'] . '&event=' . $_POST['event'] . '&pool=' . $_POST['pool'];
$main_url = 'https://kdga.org/fundraising/admin/payments.php?bu=' . strtolower($bus_unit) . $link_main;

/* Example: https://kdga.org/fundraising/admin/payment.php?bu=scddgc */
$location = "Location: " . $main_url;
header($location);
exit;
?>
