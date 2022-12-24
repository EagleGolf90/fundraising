<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = BUS_UNIT;
$yearPick = $_POST['yearPick'];
$eventType = $_POST['eventType'];
$poolNumber = $_POST['poolNumber'];
$personID = $_POST['id'];
$cost = $_POST['cost'];
$arr = $_POST['squares'];
$qty = 0;
$arr2 = comma_separated_to_array($_POST['saved_squares']);

for ($y = 0; $y < sizeof($arr); $y++) {
  if ($arr[$y] == 0) {
    $dml_label = 'Delete';
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $arr2[$y]);
    $ret = $sqlTable->execute('deleteSquares', $parm);
  } else {
    $qty++;
    $dml_label = 'Update';
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $arr2[$y], $arr[$y]);
    $ret = $sqlTable->execute('updateSquares', $parm);
  }
}

if ($qty == 0) {
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID);
  $ret = $sqlTable->execute('deleteSquaresPayment', $parm);
} else {
  $total_cost = $qty * $cost;
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $qty, $total_cost);
  $ret = $sqlTable->execute('updateSquaresPayment', $parm);
}

$main_url = 'https://kdga.org/' . strtolower(BUS_UNIT) . '/admin/';
$location = "Location: " . $main_url . "payments.php";
header($location);
exit;
?>

