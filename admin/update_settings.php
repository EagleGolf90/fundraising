<?php
include('../preload.php');

$sqlTable = new SQLTable();
$mass_emails = $_POST['massEmails'] == 'Y' ? 'Y' : 'N';

$parm = array($_POST['yearPick'], $_POST['eventType'], $_POST['poolNumber'], $mass_emails);
$ret = $sqlTable->execute('updateSettings', $parm);

$location = "Location: " . 'https://kdga.org/fundraising/menus/?bu=' . strtolower($_POST['bu']);
header($location);
exit;
?>
