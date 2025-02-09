<?php
class CurrentEvent {
    private $businessUnit;
    private $yearPick;
    private $eventType;
    private $poolNumber;
    private $eventTitle;
    private $cost;
    private $fundDescription;
    private $amount;
    private $giveAmount;
    private $keepAmount;
    private $formulaType;
    private $showNames;
    private $deadline;
    private $instructionCheck;
    private $label_name;
    private $front_picture;
    private $picture_file;
    private $totalSquares;


    public function __construct() {
    }

    public function getBusinessUnit() { return $this->businessUnit; }
    public function getYearPick() { return $this->yearPick; }
    public function getEventType() { return $this->eventType; }
    public function getPoolNumber() { return $this->poolNumber; }
    public function getEventTitle() { return $this->eventTitle; }
    public function getCost() { return $this->cost; }
    public function getFundDescription() { return $this->fundDescription; }
    public function getAmount() { return $this->amount; }
    public function getGiveAmount() { return $this->giveAmount; }
    public function getKeepAmount() { return $this->keepAmount; }
    public function getFormulaType() { return $this->formulaType; }
    public function getShowNames() { return $this->showNames; }
    public function getDeadline() { return $this->deadline; }
    public function getInstructionCheck() { return $this->instructionCheck; }
    public function getLabelName() { return $this->label_name; }
    public function getFrontPicture() { return $this->front_picture; }
    public function getPictureFile() { return $this->picture_file; }
    public function getTotalSquares() { return $this->totalSquares; }

    public function load($row) {
      $this->businessUnit = $row['BusinessUnit'];
      $this->yearPick = $row['YearPick'];
      $this->eventType = $row['EventType'];
      $this->poolNumber = $row['PoolNbr'];
      $this->eventTitle = $row['Description'];
      $this->cost = $row['Cost'];
      $this->fundDescription = $row['FundDesc'];
      $this->amount = $row['Amount'];
      $total = $this->cost * 100;
      $this->giveAmount = ($total * ($row['GivePercent']/100));
      $this->keepAmount = ($total * ($row['KeepPercent']/100));
      $this->formulaType = $row['Formula'];
      $this->showNames = $row['ShowNames'];
      $this->deadline = $row['Deadline'];
      $this->instructionCheck = $row['full_instruction'];
      $this->label_name = $row['label_name'];
      $this->front_picture = $row['front_picture'];
      $this->picture_file = $row['picture_file'];
      $this->totalSquares = $row['NumberOfSquares'];
    }
}
?>
