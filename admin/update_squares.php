<?php
/*
 * Program Name: update_squares.php
 * Author......: Brian Timberlake
 * Date Created: September 9, 2019
 */
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = strtoupper($_POST['bu']);
$yearPick = $_POST['yearPick'];
$eventType = $_POST['eventType'];
$poolNumber = $_POST['poolNumber'];
$personID = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$cost = $_POST['cost'];
$arr = $_POST['squares'];
$qty = 0;
$arr2 = comma_separated_to_array($_POST['saved_squares']);

/* Update First and Last Names */
<<<<<<< Updated upstream
$parm = array($personID, $firstName, $lastName, $_POST['nickName']);
=======
<<<<<<< HEAD
$parm = array($personID, $firstName, $lastName);
=======
$parm = array($personID, $firstName, $lastName, $_POST['nickName']);
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
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
$main_url = 'https://kdga.org/fundraising/admin/payments.php?bu=' . strtolower($busUnit);
$location = "Location: " . $main_url;
header($location);
exit;
?>
