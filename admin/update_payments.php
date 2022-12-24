<?php
include('../preload.php');

$sqlTable = new SQLTable();
$paid = ($_POST['paid'] == 'on') ? 'Y' : 'N';
$parm = array(BUS_UNIT, $_POST['PersonID'], $paid);
$ret = $sqlTable->execute('updatePayments', $parm);

$main_url = 'https://kdga.org/' . strtolower(BUS_UNIT) . '/admin/';

/* https://kdga.org/pcdgc/admin/payments.php */
$location = "Location: " . $main_url . "payments.php";
header($location);
exit;
?>
