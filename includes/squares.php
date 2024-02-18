<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$bu = BUS_UNIT;
$squares->setYearPick($yearPlayed);
$squares->setEventType($eventType);
$squares->setPoolNumber($poolNumber);
$squares->loadSquares();

$fullInstructionFlag = $squares->checkFullInstructions();
?>
