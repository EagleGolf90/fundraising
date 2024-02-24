<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$bu = $bus_unit;
$squares->setBusinessUnit($bus_unit);
$squares->setYearPick($yearPlayed);
$squares->setEventType($eventType);
$squares->setPoolNumber($poolNumber);
$squares->loadSquares();

$fullInstructionFlag = $squares->checkFullInstructions();
?>
