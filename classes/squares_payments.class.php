<?php
include(INCLUDES . 'constants.php');

class SquaresPayments {
  private $sqlTable;
  private $firstName;
  private $lastName;
  private $totalSquares;
  private $yearPick;
  private $eventType;
  private $poolNumber;
  private $eventTitle;
  private $nickName;
  private $list_flag;
  private $bus_unit;

  private function checkPage() {
    switch (PAGE_NAME) {
      case 'index.php':
      case 'lists.php':
          return true;
      default:
          return false;
    }
  }

  public function __construct() {
    $this->list_flag = $this->checkPage();
    $this->sqlTable = new SQLTable();
    if ($this->list_flag == true) $this->setup();
  }

  public function __destruct() { unset($this->sqlTable); }

  public function getBusinessUnit() { return $this->bus_unit; }
  public function getYearPick() { return $this->yearPick; }
  public function getEventType() { return $this->eventType; }
  public function getPoolNumber() { return $this->poolNumber; }
  public function setBusinessUnit($bu) { $this->bus_unit = $bu; }
  public function setYearPick($yearPick) { $this->yearPick = $yearPick; }
  public function setEventType($eventType) { $this->eventType = $eventType; }
  public function setPoolNumber($poolNumber) { $this->poolNumber = $poolNumber; }

  public function getEventTitle() { return $this->eventTitle; }
  public function getName() { return $this->nickName; }
  public function getTotalSquares() { return $this->totalSquares; }

  private function returnArguments() { return array($this->yearPick, $this->eventType, $this->poolNumber); }

  public function setup() {
    if ($this->list_flag == true) {
      $rs = $this->sqlTable->load('loadCurrentEvents', array());
    } else {
      $parm = array($this->bus_unit, $this->yearPick, $this->eventType, $this->poolNumber);
      $rs = $this->sqlTable->load('getCurrentEvents', $parm);
    }

    $this->eventTitle = "Payments";
    foreach ($rs As $r) {
      $this->yearPick = $r['YearPick'];
      $this->eventType = $r['EventType'];
      $this->poolNumber = $r['PoolNbr'];
      $this->eventTitle = $r['EventDescription'];
    }
  }

  public function getInfo() {
    // $parm = array(BUS_UNIT, $_GET['id']);
    $parm = array($_GET['bu'], $_GET['id']);
    $rows = $this->sqlTable->load('loadParticipants', $parm);

    foreach ($rows As $row) {
      $this->firstName = $row['FirstName'];
      $this->lastName = $row['LastName'];
      $this->nickName = $row['NickName'];
    }
  }

  public function getOwnSquares($personID) {
    $tempSquares = '';
    //$parm = array(BUS_UNIT, $personID);
    $parm = array($this->bus_unit, $personID);
    $rs = $this->sqlTable->load('loadPeoplePicks', $parm);

    foreach ($rs As $r) {
      if ($tempSquares != '') { $tempSquares .= ', '; }
      $tempSquares .= $r['SquareNbr'];
      $this->totalSquares += 1;
    }

    return $tempSquares;
  }

  public function loadPayments() {
    $this->totalSquares = 0;
    $parm = array($this->bus_unit, $this->yearPick, $this->eventType, $this->poolNumber);
    return $this->sqlTable->load('loadPayments', $parm);
  }

  public function loadNames() {
    //$parm = array(BUS_UNIT, $this->yearPick, $this->eventType, $this->poolNumber);
    $parm = array($this->bus_unit, $this->yearPick, $this->eventType, $this->poolNumber);
    return $this->sqlTable->load('loadNames', $parm);
  }
}
?>
