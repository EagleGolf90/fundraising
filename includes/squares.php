<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$bu = BUS_UNIT;
$yearPlayed = $squares->getYearPick();
$eventType = $squares->getEventType();
$poolNumber = $squares->getPoolNumber();
$fullInstructionFlag = $squares->checkFullInstructions();
?>
