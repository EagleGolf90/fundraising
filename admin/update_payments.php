<?php
include('../preload.php');

$sqlTable = new SQLTable();
$paid = ($_POST['paid'] == 'on') ? 'Y' : 'N';
$parm = array(strtoupper($_POST['bu']), $_POST['PersonID'], $paid);
$ret = $sqlTable->execute('updatePayments', $parm);

$main_url = 'https://kdga.org/fundraising/admin/payments.php?bu=' . strtolower($_POST['bu']);

/* https://kdga.org/fundraising/admin/payment.php?bu=scddgc */
$location = "Location: " . $main_url;
header($location);
exit;
?>
