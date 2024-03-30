<?php
class Square_Winners {
  private $sqlTable;
  private $bus_unit;
  private $yearPick;
  private $eventType;
  private $poolNumber;

  public function __construct() {
    $this->sqlTable = new SQLTable();
    $this->bus_unit = strtoupper($_GET['bu']);
    $this->yearPick = $_GET['yr'];
    $this->eventType = $_GET['event'];
    $this->poolNumber = $_GET['pool'];
  }

  private function getParameters($round) {
    $round_clause = ($round > 0 ? 'and Rounds = ' . $round : '');
    return array($this->bus_unit, $this->yearPick, $this->eventType, $this->poolNumber, $round_clause);
  }

  public function loadWinners($round) {
    $parm = $this->getParameters($round);
    return $this->sqlTable->load('loadWinnersPrize', $parm);
  }

  public function listSquareWinners() {
    $parm = $this->getParameters(0);
    return $this->sqlTable->load('listSquareWinners', $parm);
  }
}
?>
