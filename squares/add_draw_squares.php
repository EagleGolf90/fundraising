<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = $_POST['bu'];
$yearPick = $_POST['YearPick'];
$eventType = $_POST['EventType'];
$poolNumber = $_POST['PoolNumber'];
$quarter = $_POST['quarter'];

for ($x = 0; $x < 10; $x++) {
  $leftScore = $_POST['left_column' . ($x+1)];
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, 'LA', $quarter, $x, $leftScore);
  $ret = $sqlTable->execute('updateSquaresGridDraw', $parm);

  $topScore = $_POST['top_column' . ($x+1)];
  $parm = array($busUnit, $yearPick, $eventType, $poolNumber, 'TA', $quarter, $x, $topScore);
  $ret = $sqlTable->execute('updateSquaresGridDraw', $parm);
}

echo $ret;
?>
