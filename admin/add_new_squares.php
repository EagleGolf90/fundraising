<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = $_POST['bu'];
$yearPick = $_POST['YearPick'];
$eventType = $_POST['EventType'];
$poolNumber = $_POST['PoolNumber'];
$quarter = $_POST['quarter'];

// echo 'Business Unit: ' . $busUnit . '<br/>';
// echo 'Year Pick: ' . $yearPick . '<br/>';
// echo 'Event Type: ' . $eventType . '<br/>';
// echo 'Pool Number: ' . $poolNumber . '<br/><br/>';

$parm = array($busUnit, $yearPick, $eventType, $poolNumber, $quarter);
$ret = $sqlTable->execute('deleteSquaresGridDraw', $parm);

//for ($quarter = $quarterNbr; $quarter <= $quarterNbr; $quarter++) {
  // echo '<u>Quarter ' . $quarter . '</u><br/>';
  for ($x = 0; $x < 10; $x++) {
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, 'LA', $quarter, $x, 0);
    //$ret = $sqlTable->execute(INSERT . SQUARES . GRID . DRAW, $parm);
    $ret = $sqlTable->execute('InsertSquaresGridDraw', $parm);
    echo '*** Left Area Column ' . $x . '<br/>';

    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, 'TA', $quarter, $x, 0);
    //$ret = $sqlTable->execute(INSERT . SQUARES . GRID . DRAW, $parm);
    $ret = $sqlTable->execute('InsertSquaresGridDraw', $parm);
    echo '*** Top Area Column ' . $x . '<br/>';
  }
  echo '<br/>';
//}

echo '*** Add Squares successful ***<br/>';
?>
