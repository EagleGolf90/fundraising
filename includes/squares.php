<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$yearPlayed = $squares->getYearPick();
$eventType = $squares->getEventType();
$poolNumber = $squares->getPoolNumber();
?>
