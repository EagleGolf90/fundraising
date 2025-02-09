<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = $_POST['bu'];
$yearPick = $_POST['YearPick'];
$eventType = $_POST['EventType'];
$poolNumber = $_POST['PoolNumber'];
$showNames = $_POST['showNames'];
$leftTeam = $_POST['leftTeam'];
$topTeam = $_POST['topTeam'];

$parm = array($busUnit, $yearPick, $eventType, $poolNumber);
$rows = $sqlTable->load('checkSquaresGridTeam', $parm);
foreach ($rows as $row) $total = $row['Total'];

if ($total == 0) {
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $topTeam, $leftTeam);
    $ret = $sqlTable->execute('insertSquaresGridTeam', $parm);
} else {
    $parm = array($busUnit, $yearPick, $eventType, $poolNumber, $topTeam, $leftTeam);
    $ret = $sqlTable->execute('updateSquaresGridTeam', $parm);
}

$parm = array($busUnit, $yearPick, $eventType, $poolNumber, $showNames);
$ret = $sqlTable->execute('updateFundraising', $parm);
?>
