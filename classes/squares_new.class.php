<?php
/*
 * Program Name..: squares.class.php
 * Author........: Brian Timberlake
 * Date Created..: September 9, 2019
 */
include(INCLUDES . 'constants.php');

class Squares {
  private $sqlTable;
  private $yearPick;
  private $eventType;
  private $poolNumber;
  private $eventTitle;
  private $formulaType;
  private $topTeam;
  private $leftTeam;
  private $topSquares;
  private $leftSquares;
  private $listPick;
  private $businessUnit;
  private $cost;
  private $maxSeqNo;
  private $fundDescription;
  private $amount;
  private $giveAmount;
  private $keepAmount;
  private $boxes;
  private $boxSelected;
  private $boxesSelected;
  private $boxExcluded;
  private $selectBoxes;
  private $openForPublic;
  private $showNames;
  private $idLabel;
<<<<<<< Updated upstream
  private $id_label;
=======
<<<<<<< HEAD
=======
  private $id_label;
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
  private $saved;
  private $deadline;
  private $instructionCheck;
  private $text_instructions;
  private $instructions_footer;
  private $first_name = '';
  private $last_name = '';
  private $draw_numbers = 0;
  private $sports;
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
  private $labels;
  private $id_labels;
=======
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes

  public function __construct() {
    $this->sqlTable = new SQLTable();
    $this->openForPublic = false;
    if (DEBUG_FLAG) echo 'In Squares constructor<br/>';
    $this->resetVariables();
    $this->loadSquares();
  }

  public function __destruct() {
    $this->listPick = null;
    $this->topTeam = null;
    $this->leftTeam = null;
    $this->topSquares = null;
    $this->leftSquares = null;
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    $this->labels = null;
    $this->id_levels = null;
=======
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
    $this->poolNumber = null;
    unset($this->sqlTable);
  }

  private function resetVariables() {
    $this->boxSelected = '';
    $this->topSquares = array();
    $this->leftSquares = array();
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    $this->labels = array();
    $this->id_labels = array();
=======
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
    $this->topTeam = '';
    $this->leftTeam = '';
    $this->boxExcluded = '';
  }

  private function loadSquares() {
    if (DEBUG_FLAG) echo 'In loadSquares before getCurrentEvent()<br/>';

    $this->getCurrentEvent();
    if ($this->openForPublic == true) {
      $this->displayTeams();
      $this->teamSquares();
      $this->populatePicks();
      $this->getTexts();
      $this->getFooterTexts();
<<<<<<< Updated upstream
    }
  }

=======
<<<<<<< HEAD
      $this->loadLabels();
    }
  }

  private function saveToArray($sql, $fieldName) {
    $rows = $this->sqlTable->load($sql, array($this->eventType));
    $x = 0;
    $obj = array();
    foreach ($rows as $row) {
      $obj[$x] = $row[$fieldName];
      $x++;
    }
    return $obj;
  }

  private function loadLabels() {
    $this->labels = $this->saveToArray('loadLabelsForLeftArea', 'SquareLabel');
    $this->id_labels = $this->saveToArray('loadIDForLeftArea', 'id_label');
  }

=======
    }
  }

>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
  public function openForPublic() { return $this->openForPublic; }

  private function getCurrentEvent() {
    if (DEBUG_FLAG) echo 'In getCurrentEvent()<br/>SQLName: loadCurrentEvents<br/>';
    $rows = $this->sqlTable->load('loadCurrentEvents', array());

    foreach ($rows As $row) {
      $this->openForPublic = true;
      $this->businessUnit = $row['BusinessUnit'];
      $this->yearPick = $row['YearPick'];
      $this->poolNumber = $row['PoolNbr'];
      $this->eventType = $row['EventType'];
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
      $this->draw_numbers = $row['draw_numbers'];
      $this->sports = $row['Sports'];
    }

    $this->determineWhichLabels();
  }

  public function setBoxes($boxes) {
    $this->boxes = $boxes;
    $this->extractBoxesSelected();
  }

  public function setYearPick($yr) { $this->yearPick = $yr; }
  public function setEventType($type) { $this->eventType = $type; }
  public function setPoolNumber($pool) { $this->poolNumber = $pool; }

  public function extractBoxesSelected() {
    for ($x = 0; $x < count($this->boxes); $x++) {
      if ($x > 0) $this->boxSelected .= ', ';
      $this->boxSelected .= $this->boxes[$x];
    }
  }

  public function getShowNames() { return $this->showNames; }
  public function getBoxSelected() { return $this->selectBoxes; }
  public function getBoxExcluded() { return $this->boxExcluded; }
  public function getBoxLabel() { return ($this->howManyBoxesExcluded() > 1) ? 'boxes' : 'box'; }
  public function countTotalExcluded() { return ($this->boxExcluded != ''); }
  public function getBusinessUnit() { return $this->businessUnit; }
  public function getYearPick() { return $this->yearPick; }
  public function getEventType() { return $this->eventType; }
  public function getPoolNumber() {	return $this->poolNumber; }
  public function getFundDesc() { return $this->fundDescription; }
  public function getGiveAmount() { return $this->giveAmount; }
  public function getKeepAmount() { return $this->keepAmount; }
  public function getCost() { return $this->cost; }
  public function howManyBoxesSelected() { return count(comma_separated_to_array($this->boxSelected)); }
  public function howManyBoxesExcluded() { return count(comma_separated_to_array($this->boxExcluded)); }
  public function getSavedSquares() { return $this->saved; }
  public function getDeadline() { return $this->deadline; }
  public function checkFullInstructions() { return $this->instructionCheck; }
  public function getFullInstructions() { return $this->text_instructions; }

  public function getFirstName() { return $this->first_name; }
  public function getLastName() { return $this->last_name; }

  public function getTopTeam() { return $this->topTeam; }
  public function getLeftTeam() { return $this->leftTeam; }
  public function getInstructionsFooter() { return $this->instructions_footer; }
  public function getDrawNumbers() { return $this->draw_numbers; }

  public function getEventTitle() {
    $tempTitle = '';
    $tempTitle = str_replace(":1", $this->yearPick, $this->eventTitle);
    return $tempTitle;
  }

  public function getInstructions() {
    $parm = array($this->yearPick, $this->eventType, $this->poolNumber);
    return $this->sqlTable->load('loadInstructions', $parm);
  }

  private function populatePicks() {
    if (DEBUG_FLAG) echo 'In populatePicks()<br/>before SQLName: ' . LOAD . POPULATE_PICKS . '<br/>';
    $parm = array($this->yearPick, $this->eventType, $this->poolNumber);
    $picks = $this->sqlTable->load('loadPopulatePicks', $parm);
    if (DEBUG_FLAG) echo 'In populatePicks()<br/>after SQLName: ' . LOAD . POPULATE_PICKS . '<br/>';

    $this->listPick = array('');
    foreach ($picks As $pick) $this->listPick[$pick['SquareNbr']] = array($pick['Initials'], $pick['FullName'], $pick['Paid']);
  }

  private function teamSquares() {
    if (DEBUG_FLAG) echo 'In teamSquares()<br/>before SQLName: ' . LOAD . TEAMS . SQUARES . '<br/>';
    $parm = array(BUS_UNIT, $this->yearPick, $this->eventType, $this->poolNumber);
    $rows = $this->sqlTable->load('loadTeamsSquares', $parm);
    $y = 0;
    $z = 0;

    foreach ($rows As $row) {
      if ($row['Grid'] == 'LA') {
        $this->leftSquares[$y] = array($row['Quarter'], $row['Square'], $row['PickScore']);
        $y++;
      } else {
        $this->topSquares[$z] = array($row['Quarter'], $row['Square'], $row['PickScore']);
        $z++;
      }
    }
  }

  private function displayTeams() {
    if (DEBUG_FLAG) echo 'In displayTeams()<br/>before SQLName: displayTeams<br/>';
    $parm = array(BUS_UNIT, $this->yearPick, $this->eventType, $this->poolNumber);
    $rows = $this->sqlTable->load('displayTeams', $parm);

    foreach ($rows As $row) {
      $this->topTeam = $row['TopGridTeam'];
      $this->leftTeam = $row['LeftGridTeam'];
    }
  }

  private function printCellTopBox($id, $value) {
?>
<<<<<<< Updated upstream
      <td class='tblock' id='<?php echo $id; ?>'><b><?php echo $this->showNames == 'Y' ? $value : ''; ?></b></td>
=======
<<<<<<< HEAD
    <td class='tblock' id='<?php echo $id; ?>'><b><?php echo $this->showNames == 'Y' ? $value : ''; ?></b></td>
=======
      <td class='tblock' id='<?php echo $id; ?>'><b><?php echo $this->showNames == 'Y' ? $value : ''; ?></b></td>
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
<?php
  }

  public function printLeftBox() {
?>
    <tr>
<?php
<<<<<<< Updated upstream
    if ($this->eventType == 5) {
=======
<<<<<<< HEAD
    switch ($this->eventType) {
      case 5:
=======
    if ($this->eventType == 5) {
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
?>
      <td rowspan='11'><h2 class='rotate title'>Losing</h2></td>
      <td class='blank' id='first'></td>
<?php
<<<<<<< Updated upstream
    } else {
?>
      <td rowspan='11'><h2 class='rotate title'><?php echo $this->showNames == 'Y' ? $this->leftTeam : ''; ?></h2></td>
=======
<<<<<<< HEAD
        break;
      default:
?>
      <td rowspan='11'><h2 class='rotate title'><?php echo $this->showNames == 'Y' ? $this->leftTeam : ''; ?></h2></td>
<?php   for ($x = 3; $x >= 0; $x--) { ?>
      <td class='blank' id='fourth'>
        <?php echo $this->labels[$x]; ?>
      </td>
<?php   }
        break;
=======
    } else {
?>
      <td rowspan='11'><h2 class='rotate title'><?php echo $this->showNames == 'Y' ? $this->leftTeam : ''; ?></h2></td>
>>>>>>> Stashed changes
<?php for ($quarter = $this->draw_numbers; $quarter > 0; $quarter--) {
        $id_label = $this->getIDLabel($quarter);
        $quarter_label = $this->getQuarterLabel($quarter);
?>
        <td class='blank' id='<?php echo $id_label; ?>'><?php echo $quarter_label; ?></td>
<?php
      }
<<<<<<< Updated upstream
=======
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes
    }

    // Top Squares
    for ($a = 0; $a < 10; $a++) {
      $id = 'ta' + ($a+1);
      echo $this->PrintCellTopBox($id, $this->topSquares[$a][2]);
    }
?>
    </tr>
<?php
  }

  private function determineWhichLabels() {
    switch ($this->sports) {
      case 1: // Super Bowl
      case 2: // NBA Championship
      case 4: // PGA Masters
        $this->id_label = array("first", "second", "third", "fourth");
        $this->labels = array("1st", "2nd", "3rd", "Final");
        break;
      case 3: // MLB World Series
        $this->id_label = array("first", "second", "third");
        $this->labels = array("3rd", "6th", "Final");
        break;
    }
  }

  private function getIDLabel($quarter) { return $this->id_label[$quarter-1]; }
  private function getQuarterLabel($quarter) { return $this->labels[$quarter-1]; }

  public function printEachQuarter($quarter, $draw_numbers) {
    $quarter_label = $this->getQuarterLabel($quarter);

    if (!isset($this->draw_numbers)) {
      $colspan = 2;
    } else {
      $colspan = $draw_numbers - 1;
    }
?>
    <tr>
      <td></td>
      <td colspan='<?php echo $colspan; ?>' class='blank'></td>
      <td class='blank'><?php echo $quarter_label; ?></td>
<?php
for ($x = 0; $x < sizeof($this->topSquares); $x++) {
  if ($quarter == $this->topSquares[$x][0]) {
    $id = $quarter . '_' . ($x+1);
?>
      <td class='tblock' id='ta_<?php echo $id; ?>'><b><?php echo $this->showNames == 'Y' ? $this->topSquares[$x][2] : ''; ?></b></td>
<?php
  }
}
?>
    </tr>
<?php
  }

  private function printBoxArea($id, $className, $value) {
?>
    <td class='<?php echo $className; ?>' id='<?php echo $id; ?>'><?php echo $value; ?></td>
<?php
  }

  private function printLeftArea($rowNumber) {
    for ($quarter = $this->draw_numbers; $quarter > 0; $quarter--) {
      for ($a = 0; $a < sizeof($this->leftSquares); $a++) {
        if ($this->leftSquares[$a][0] == $quarter && $this->leftSquares[$a][1] == $rowNumber) {
          $squareBox = '<b>' . ($this->showNames == 'Y' ? $this->leftSquares[$a][2] : '') . '</b>';
          $id = 'la_' . ($rowNumber+1) . '_' . $quarter;
          $this->printBoxArea($id, 'sblock', $squareBox);
        }
      }
    }
  }

  private function getClassName($index) {
    if ($this->listPick[$index][0] == ' ') {
      if ($this->listPick[$index][2] == 'Y') {
        $class = $this->showNames == 'Y' ? 'available' : 'taken';
      } else {
        $class = 'pending';
      }
    } else {
      $class = 'available';
    }
    return $class;
  }

<<<<<<< Updated upstream
  private function getBoxNumber($index) {
    return $this->showNames == 'Y' ? $this->listPick[$index][1] : '<a href="#">' . strval($index) . '</a>';
  }
=======
<<<<<<< HEAD
  private function getBoxNumber($index) { return $this->showNames == 'Y' ? $this->listPick[$index][1] : '<a href="#">' . strval($index) . '</a>'; }
=======
  private function getBoxNumber($index) {
    return $this->showNames == 'Y' ? $this->listPick[$index][1] : '<a href="#">' . strval($index) . '</a>';
  }
>>>>>>> fffd1b4094110f53ba2bc0a72f04ab376d5c18de
>>>>>>> Stashed changes

  public function printGridSquares() {
    $n = 0;
    $z = 0;
    for ($y = 0; $y < 10; $y++) {
?>
      <tr>
<?php
      for ($x = 1; $x <= 10; $x++) {
        if ($x == 1) $this->printLeftArea($y);
        $first = $x == 10 ? $y + 1 : $y;
        $second = $x == 10 ? 0 : $x;
        $attributeBoxNumber = 'b_' . $first . '_' . $second;
        $className = $this->getClassName($z+1) . ($this->showNames == 'Y' ? ' names' : '');
        $this->printBoxArea($attributeBoxNumber, $className, $this->getBoxNumber($z+1));
        $z += 1;
      }
?>
      </tr>
<?php
    }
  }

  private function countTotalBoxes() { return count(comma_separated_to_array($_GET['box'])); }

  public function calculateAmounts($cashapp, $deadline) {
    $howMany = $this->countTotalBoxes();
    $total = $this->cost * $howMany;
    return 'Since you buy ' . $howMany . ' square(s), you need to pay $' . $total . ' to CashApp ' . $cashapp . ' by ' . $deadline . '.';
  }

  private function insertParticipant() {
    $parm = array(BUS_UNIT, $this->personID, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
    $ret = $this->sqlTable->execute('insertParticipants', $parm);
  }

  private function getUniqueID($uniqueFieldName) {
    $parm = array(BUS_UNIT, $uniqueFieldName);
    $rows = $this->sqlTable->load('getUniqueID', $parm);

    $this->personID = 1;
    foreach ($rows As $row) $this->personID = $row['UniqueID'];
    $this->personID = $this->personID + 1;

    $parm = array(BUS_UNIT, $uniqueFieldName, $this->personID);
    $ret = $this->sqlTable->execute('updateUniqueID', $parm);
  }

  private function insertPeoplePicks() {
    for ($a = 1; $a <= sizeof($this->boxesSelected); $a++) {
      if ($this->boxesSelected[$a-1] > 0) {
        $parm = array(BUS_UNIT, $this->yearPick, $this->eventType, $this->poolNumber, $this->personID, $a, $this->boxesSelected[$a-1], date("Y-m-d"));
        $ret = $this->sqlTable->execute('insertPeoplePicks', $parm);
      }
    }
  }

  private function insertPayments() {
    $qty = count($this->boxesSelected);
    $total = ($qty * $this->cost);
    $parm = array(BUS_UNIT, $this->yearPick, $this->personID, $this->eventType, $this->poolNumber, $qty, $this->cost, $total, 'N', date('Y-m-d'));
    $ret = $this->sqlTable->execute('insertPayments', $parm);
  }

  private function excludedSquares() {
    $parm = array(BUS_UNIT, $this->yearPick, $this->poolNumber, $this->eventType, $this->boxSelected);
    $rs = $this->sqlTable->load('loadSquaresByBoxNumber', $parm);

    foreach ($rs As $r) {
      $sqrNbr = $r['SquareNbr'];
      $excludedFlag = false;
      for ($x = 0; $x < count($this->boxes); $x++) {
        if ($this->boxes[$x] == $sqrNbr) {
          $excludedFlag = true;
          $this->boxes[$x] = 0;
        }
      }
      if ($excludedFlag == true) {
        if ($this->boxExcluded != '') $this->boxExcluded .= ', ';
        $this->boxExcluded .= $sqrNbr;
      }
    }

    $selectBoxes = '';
    for ($y = 0; $y < count($this->boxes); $y++) {
      if ($this->boxes[$y] > 0) {
        if ($selectBoxes != '') $selectBoxes .= ', ';
        $selectBoxes .= $this->boxes[$y];
      }
    }

    $this->boxesSelected = comma_separated_to_array($selectBoxes);
    $this->selectBoxes = $selectBoxes;
  }

  public function addParticipants() {
    $this->excludedSquares();
    if (sizeof($this->boxesSelected) > 0) {
      $this->getUniqueID('PersonID');
      $this->insertParticipant();
      $this->insertPeoplePicks();
      $this->insertPayments();
    }
  }

  public function printConferenceTeams($conference) {
    $rows = $this->sqlTable->load('loadConferenceTeams', array($conference));
    foreach ($rows as $row) echo '<option value="' . $row['Team'] . '">' . $row['TeamName'] . '</option>' . "\n";
  }

  public function loadPopulatePicks() {
    $parm = array($this->yearPick, $this->eventType, $this->poolNumber);
    return $this->sqlTable->load('loadFinalSquares', $parm);
  }

  public function getSquares() {
    $parm = array(BUS_UNIT, $_GET['id'], $_GET['yr'], $_GET['event'], $_GET['pool']);
    $rows = $this->sqlTable->load('getSquares', $parm);
    $this->saved = '';
    foreach ($rows as $row) {
      if ($this->saved != '') $this->saved .= ',';
      $this->saved .= $row['SquareNbr'];
    }
    return $rows;
  }

  public function setNames($person_id) {
    $rows = $this->sqlTable->load('getParticipantName', array(BUS_UNIT, $person_id));
    foreach ($rows as $row) {
      $this->first_name = $row['FirstName'];
      $this->last_name = $row['LastName'];
    }
  }

  private function getTexts() {
    $parm = array($this->yearPick, $this->eventType, $this->poolNumber);
    $rs = $this->sqlTable->load('loadFullInstructions', $parm);
    foreach ($rs as $r) {
      $this->text_instructions = $r['Message_Text'];
    }
  }

  private function getFooterTexts() {
    $parm = array($this->yearPick, $this->eventType, $this->poolNumber);
    $rs = $this->sqlTable->load('loadInstructionsFooter', $parm);
    foreach ($rs as $r) {
      $this->instructions_footer = $r['Message_Text'];
    }
  }
}
?>
