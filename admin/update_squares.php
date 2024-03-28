<?php
/*
 * Program Name: update_squares.php
 * Author......: Brian Timberlake
 * Date Created: September 9, 2019
 */
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = strtoupper($_POST['bu']);
$yearPick = $_POST['YearPick'];
$eventType = $_POST['EventType'];
$poolNumber = $_POST['PoolNumber'];
$personID = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$nickName = $_POST['nickName'];
$cost = $_POST['cost'];
$arr = $_POST['squares'];
$qty = 0;
$arr2 = comma_separated_to_array($_POST['saved_squares']);

/* Update First and Last Names */
$parm = array($personID, $firstName, $lastName, $nickName);
$ret = $sqlTable->execute('updateNames', $parm);

/* Update or Delete Squares */
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

/* Update or Delete Squares Payment */
if ($qty == 0) {
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID);
  $ret = $sqlTable->execute('deleteSquaresPayment', $parm);
} else {
  $total_cost = $qty * $cost;
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $personID, $qty, $total_cost);
  $ret = $sqlTable->execute('updateSquaresPayment', $parm);
}

/* Redirect to Payments page */
$queryString = '?bu=' . strtolower($busUnit) . '&yr=' . $yearPick . '&event=' . $eventType . '&pool=' . $poolNumber;
$main_url = 'https://kdga.org/fundraising/admin/payments.php' . $queryString;
$location = "Location: " . $main_url;
header($location);
exit;
?>
