<?php
/*
 * Program Name..: squares.class.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 */
//include(INCLUDES . 'constants.php');

class Squares {
  private $sqlTable;
  private $bus_unit;
  private $yearPick;
  private $eventType;
  private $poolNumber;
  private $openForPublic;
  private $topSquares;
  private $leftSquares;
  private $list_flag;
  private $businessUnit;
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
  private $which_query_parameter;

  private function CheckParameters() {
    $this->which_query_parameter = 'none';
    if (!empty($_GET)) $this->which_query_parameter = 'get';
    if (!empty($_POST)) $this->which_query_parameter = 'post';

    if ($this->which_query_parameter == 'none') {
      return 'No';
    } else {
      return 'Yes';
    }
  }

  public function __construct() {
    $this->list_flag = $this->CheckParameters();
    $this->sqlTable = new SQLTable();
    $this->openForPublic = false;
    if (DEBUG_FLAG) echo 'In Squares constructor<br/>';
    $this->ResetVariables();
  }

  public function __destruct() {
    $this->topSquares = null;
    $this->leftSquares = null;
    $this->poolNumber = null;
    unset($this->sqlTable);
  }

  private function ResetVariables() {
    $this->topSquares = array();
    $this->leftSquares = array();
  }

  public function SetBusinessUnit($bu) { $this->bus_unit = $bu; }
  public function SetYearPick($yr) { $this->yearPick = $yr; }
  public function SetEventType($type) { $this->eventType = $type; }
  public function SetPoolNumber($pool) { $this->poolNumber = $pool; }

  public function GetTotalSquares() { return $this->totalSquares; }

  public function CheckQueryParameters() { return $this->which_query_parameter; }

  public function LoadSquares() {
    if (DEBUG_FLAG) echo 'In LoadSquares before GetCurrentEvent()<br/>';

    $squares_flag = $this->GetCurrentEvent();

    // if ($this->list_flag == 'Yes')
    //   echo 'We have parameters.<br/>';
    // else
    //   echo 'We don\'t have parameters.<br/>';

    if ($this->list_flag == 'Yes')
    {
      
    }

    return $squares_flag;
  }

  private function ReturnArguments() { return array($this->yearPick, $this->eventType, $this->poolNumber); }

  private function GetCurrentEvent()
  {
    if (DEBUG_FLAG) echo 'In GetCurrentEvent()<br/>SQLName: LoadCurrentEvents<br/>';
    if ($this->list_flag == 'Yes') {
      $rows = $this->sqlTable->load('LoadCurrentEvents', array());
    } else  {
      $rows = $this->sqlTable->load('GetCurrentEvents', $this->ReturnArguments());
    }

    $flag = false;
    foreach ($rows As $row) {
      $this->openForPublic = true;
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
      $flag = 'Yes';
    }
    if ($flag == 'Yes') {
      // echo 'GetMainEmailAddress()<br/>';
      // echo 'LoadBusinessTitle()<br/>';

      // $this->GetMainEmailAddress();
      // $this->LoadBusinessTitle();
    }
    return $flag == 'Yes';
  }

  public function GetMyPicked() {
    return array();
  }
}
?>
