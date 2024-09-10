<?php
include('../preload.php');

$sqlTable = new SQLTable();

$busUnit = $_POST['bu'];
$yearPick = $_POST['YearPick'];
$eventType = $_POST['EventType'];
$poolNumber = $_POST['PoolNumber'];
$rounds = $_POST['rounds'];
$seqNo = $_POST['game'];
$winningTeam = $_POST['winningTeam'];
$winningScore = intval($_POST['winningScore']);
$losingTeam = $_POST['losingTeam'];
$losingScore = intval($_POST['losingScore']);
$topScore = intval($winningScore / 10);
$leftScore = intval($losingScore / 10);

$parm = array($busUnit, $yearPick, $eventType, $poolNumber, $rounds, $seqNo, $winningTeam, $losingTeam, $topScore, $leftScore, $winningScore, $losingScore);
$ret = $sqlTable->execute('insertSquareGridWinners', $parm);
?>
