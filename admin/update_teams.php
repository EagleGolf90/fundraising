<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = $_POST['bus_unit'];
$yearPick = $_POST['yearPick'];
$eventType = $_POST['eventType'];
$poolNumber = $_POST['poolNumber'];
$showNames = $_POST['showNames'];
$leftTeam = $_POST['leftTeam'];
$topTeam = $_POST['topTeam'];

$parm = array($busUnit, $yearPick, $eventType, $poolNumber, $topTeam, $leftTeam);
$ret = $sqlTable->execute(UPDATE . SQUARES . GRID . TEAM, $parm);

$parm = array($busUnit, $yearPick, $eventType, $poolNumber, $showNames);
$ret = $sqlTable->execute(UPDATE . FUNDRAISING, $parm);
?>
