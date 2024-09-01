<?php
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$bu = $bus_unit;
$squares->setBusinessUnit($bus_unit);
$squares->setYearPick($yearPlayed);
$squares->setEventType($eventType);
$squares->setPoolNumber($poolNumber);
if ($squares->loadSquares()) {
  $fullInstructionFlag = $squares->checkFullInstructions();
} else {
  echo '<h2>There is no fundraising at this time. Please come back again.</h2><br/>';
  echo '<h3>Today\'s date: ' . date('F d, Y H:i:s') . '</h3>';
}
?>
