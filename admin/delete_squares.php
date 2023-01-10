<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = strtoupper($_POST['bu']);
$yearPick = $_POST['yr'];
$eventType = $_POST['event'];
$poolNumber = $_POST['pool'];
$personID = $_POST['id'];
$arr = comma_separated_to_array($_POST['saved_squares']);

if ($_POST['confirm'] == 'yes') {
  for ($y = 0; $y < sizeof($arr); $y++) {
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $arr[$y]);
    $ret = $sqlTable->execute('deleteSquares', $parm);

    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $arr[$y]);
    $ret = $sqlTable->execute('deleteSquaresPayment', $parm);

    $parm = array($busUnit, $personID);
    $ret = $sqlTable->execute('deleteSquaresParticipant', $parm);
  }
}

$main_url = 'https://kdga.org/fundraising/admin/payments.php?bu=' . strtolower($_POST['bu']);
$location = "Location: " . $main_url;
header($location);
exit;
?>
