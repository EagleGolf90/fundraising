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
  private $saved;
  private $deadline;
  private $instructionCheck;
  private $text_instructions;
  private $instructions_footer;
  private $first_name = '';
  private $last_name = '';
  private $labels;
  private $id_labels;
  private $nick_name = '';
  private $label_name = '';
  private $square_winners;
  private $square_text;
  private $personID;
  private $mainEmailAddress;
  private $mass_emails = '';
  private $sub_instructions = '';
  private $diamond_touch = '';
  private $four_corners = '';
  private $FAB = '';
  private $reverse_winner = '';

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
    $this->labels = null;
    $this->id_levels = null;
    $this->poolNumber = null;
    unset($this->sqlTable);
  }

  private function resetVariables() {
    $this->boxSelected = '';
    $this->topSquares = array();
    $this->leftSquares = array();
    $this->labels = array();
    $this->id_labels = array();
    $this->square_winners = array();
    $this->square_text = array();
    $this->topTeam = '';
    $this->leftTeam = '';
    $this->boxExcluded = '';
  }

  private function loadSquares() {
    if (DEBUG_FLAG) echo 'In loadSquares before getCurrentEvent()<br/>';

    $this->getCurrentEvent();
    $this->getData();
    if ($this->openForPublic == true) {
      $this->displayTeams();
      $this->teamSquares();
      $this->populatePicks();
      $this->getTexts();
      $this->getFooterTexts();
      $this->loadLabels();
    }
  }

  private function getData() {
    $rows = $this->sqlTable->load('checkFourCorners', $this->returnArguments());
    foreach ($rows as $row) $this->four_corners = $row['UseCorners'];

    $rows = $this->sqlTable->load('checkDiamondTouch', $this->returnArguments());
    foreach ($rows as $row) $this->diamond_touch = $row['UseDiamondTouch'];

    $rows = $this->sqlTable->load('checkFAB5', $this->returnArguments());
    foreach ($rows as $row) $this->FAB = $row['UseFAB'];

    $rows = $this->sqlTable->load('checkReverseWinners', $this->returnArguments());
    foreach ($rows as $row) $this->reverse_winner = $row['UseReverseWinner'];
  }

  public function getSquareTexts() { return $this->square_text; }

  private function loadLabels() {
    $rows = $this->sqlTable->load('loadLabelsForTopLeftArea', array($this->eventType));
    $x = 0;
    foreach ($rows as $row) {
      $this->labels[$x] = $row['SquareLabel'];
      $this->id_labels[$x] = $row['id_label'];
      $this->square_text[$x] = $row['SquareText'];
      $x++;
    }
  }

  public function getMainEmailAddress() {
    $parm = $this->returnArguments();
    $rows = $this->sqlTable->load('loadMainEmail', $parm);
    foreach ($rows as $row) {
      $this->mainEmailAddress = $row['MainEmailAddress'];
      $this->mass_emails = $row['EmailSent'];
    }
    return $this->mainEmailAddress;
  }

  public function getPaymentYears() {
    $parm = $this->returnArguments();
    return $this->sqlTable->load('getPaymentYears', $parm);
  }

  public function openForPublic() { return $this->openForPublic; }
  public function getLabelName() { return $this->label_name; }
  public function getMassEmails() { return $this->mass_emails; }

  private function getCurrentEvent() {
    if (DEBUG_FLAG) echo 'In getCurrentEvent()<br/>SQLName: ' . LOAD . CURRENT . EVENTS . '<br/>';
    $rows = $this->sqlTable->load('loadCurrentEvents', array());

    foreach ($rows As $row) {
      $this->openForPublic = true;
      $this->businessUnit = $row['BusinessUnit'];
      $this->yearPick = $row['YearPick'];
      define('YEAR_PICK', $row['YearPick']);
      $this->poolNumber = $row['PoolNbr'];
      define('POOL_NBR', $row['PoolNbr']);
      $this->eventType = $row['EventType'];
      $this->eventTitle = $row['Description'];
      $this->cost = $row['Cost'];
      $this->fundDescription = $row['FundDesc'];
      $this->amount = $row['Amount'];
      $total = $this->cost * 100;
      $this->giveAmount = ($total * ($row['GivePercent']/100));
      $this->keepAmount = ($total * ($row['KeepPercent']/100));
      $this->formulaType = $row['Formula'];
      define('FORMULA', $row['Formula']);
      $this->showNames = $row['ShowNames'];
      $this->deadline = $row['Deadline'];
      $this->instructionCheck = $row['full_instruction'];
      $this->label_name = $row['label_name'];
    }
    $this->getMainEmailAddress();
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
  public function getSubInstructions() { return $this->sqlTable->load('loadInstructions', $this->returnArguments()); }
  public function getDiamondTouch() { return $this->diamond_touch; }
  public function getFourCorners() { return $this->four_corners; }
  public function getFAB5() { return $this->FAB; }
  public function getReverseWinners() { return $this->reverse_winner; }
  public function getAllCosts() { return $this->sqlTable->load('loadCosts', $this->returnArguments()); }

  public function getFirstName() { return $this->first_name; }
  public function getLastName() { return $this->last_name; }
  public function getNickName() { return $this->nick_name; }

  public function getTopTeam() { return $this->topTeam; }
  public function getLeftTeam() { return $this->leftTeam; }

  public function getEventTitle() {
    $tempTitle = '';
    $tempTitle = str_replace(":1", $this->yearPick, $this->eventTitle);
    return $tempTitle;
  }

  public function getEventNames() { return $this->sqlTable->load('loadEventNames', array()); }
  public function loadPoolNumbers() { return $this->sqlTable->load('loadPoolNumbers', array()); }

  public function getInstructions() {
    $parm = $this->returnArguments();
    return $this->sqlTable->load('loadInstructions', $parm);
  }

  public function endEmails() {
    $parm = $this->returnArguments();
    $this->sqlTable->execute('updateEndEmails', $parm);
  }

  public function getDropDownLists() { return $this->sqlTable->load('loadDropDownLists', array($this->eventType)); }

  private function populatePicks() {
    if (DEBUG_FLAG) echo 'In populatePicks()<br/>before SQLName: ' . LOAD . POPULATE_PICKS . '<br/>';
    $parm = $this->returnArguments();
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
    if (DEBUG_FLAG) echo 'In displayTeams()<br/>before SQLName: ' . DISPLAY . TEAMS . '<br/>';
    $parm = array(BUS_UNIT, $this->yearPick, $this->eventType, $this->poolNumber);
    $rows = $this->sqlTable->load('displayTeams', $parm);

    foreach ($rows As $row) {
      $this->topTeam = $row['TopGridTeam'];
      $this->leftTeam = $row['LeftGridTeam'];
    }
  }

  private function printCellTopBox($id, $value) {
?>
    <td class='tblock' id='<?php echo $id; ?>'><b><?php echo $this->showNames == 'Y' ? $value : ''; ?></b></td>
<?php
  }

  public function printNFLLeftBox() {
?>
    <tr>
<?php
    switch ($this->eventType) {
      case 5:
?>
      <td rowspan='11'><h2 class='rotate title'>Losing</h2></td>
      <td class='blank' id='first'></td>
<?php
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

  private function printNFLTopBox() {
?>
    <tr><td></td><td colspan='14'><h2 class='title'><?php echo $this->showNames == 'Y' ? $this->topTeam : ''; ?></h2></td></tr>
<?php
  }

  private function printWinningTop() {
?>
    <tr><td></td><td colspan='14'><h2 class='title'>Winning</h2></td></tr>
<?php
  }

  private function sectionLabel($quarter) {
    $label = '';
    switch ($quarter) {
      case 4:
        $label = 'Pending';
        break;
      case 3:
        $label = 'Taken';
        break;
      case 2:
        $label = 'Select';
        break;
      case 0:
        break;
    }
    return $label;
  }

  private function printEachQuarter($quarter) {
    $sectionLabel = $this->sectionLabel($quarter);
?>
    <tr>
      <td></td>
      <td colspan='3' class='blank <?php echo strtolower($sectionLabel) . 'Title'; ?>'><?php echo $sectionLabel . ($sectionLabel == 'Select' ? 'ed' : ''); ?></td>
      <td class='blank' id='<?php
      echo $this->id_labels[$quarter-1];
      ?>'>
        <?php echo $this->labels[$quarter-1]; ?>
      </td>
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

  private function printTopFourQuarters() {
    for ($y = 4; $y > 1; $y--) $this->printEachQuarter($y);
  }

  private function printBoxArea($id, $className, $value) {
?>
    <td class='<?php echo $className; ?>' id='<?php echo $id; ?>'><?php echo $value; ?></td>
<?php
  }

  private function printLeftArea($rowNumber) {
    for ($quarter = 4; $quarter > 0; $quarter--) {
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

  private function getBoxNumber($index) {
    return $this->showNames == 'Y' ? $this->listPick[$index][1] : '<a href="#">' . strval($index) . '</a>';
  }

  private function printGridSquares() {
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

  public function printPrizesInfo() {
?>
    <tr>
      <td class="ctr instruction" colspan="3">&nbsp;</td>
      <td class="ctr instruction" colspan="8">
        <?php echo $this->instructions_footer; ?>
      </td>
      <td class="ctr instruction" colspan="4">&nbsp;</td>
    </tr>
<?php
  }

  private function printInstructionButton() {
?>
    <tr>
      <td class="ctr" colspan="15"><button type="submit" id="submitForm" class="btn btn-primary btn-lg">Ready to buy Squares</button><br/></td>
    </tr>
    <tr>
      <td class="ctr event" colspan="15">
        <h4><a href="<?php echo SQUARES_URL . strtolower(SQUARES) . DS . '?bu=' . strtolower(BUS_UNIT); ?>">Back to Instructions</a></h4>
      </td>
    </tr>
<?php
  }

  public function printSquares() {
    if ($this->eventType == 5) {
      $this->printWinningTop();
    } else {
      $this->printNFLTopBox();   // Top Row
      $this->printTopFourQuarters(); // Top Row Four Quarters
    }

    $this->printNFLLeftBox();  // Left Column
    $this->printGridSquares(); // 100 Box Cells

    if ($this->showNames == 'N') {
      $this->printInstructionButton();
    }
    $this->printPrizesInfo();
  }

  private function returnArguments() { return array($this->yearPick, $this->eventType, $this->poolNumber); }

  public function loadAllEmails() { return $this->sqlTable->load('loadAllEmails', array()); }
  public function addEmailSent($parm) { $ret = $this->sqlTable->load('addEmailSent', $parm); }

  public function loadCurrentEmails() {
    $parm = $this->returnArguments();
    return $this->sqlTable->load('loadCurrentEmails', $parm);
  }

  private function countTotalBoxes() { return count(comma_separated_to_array($_GET['boxSelected'])); }

  public function calculateAmounts($zelle, $cashApp, $deadline) {
    $howMany = $this->countTotalBoxes();
    $total = $this->cost * $howMany;
    $message = 'Since you buy ' . $howMany . ' square(s), you need to send $' . $total;
    if (trim($cashApp) != '') {
      $message .= '<br/>through CashApp ' . $cashApp . ' by ' . $deadline . '.';
    } else {
      $message .= '<br/>through Zelle ' . $zelle . ' by ' . $deadline . '.';
    }
    return $message;
  }

  private function insertParticipant() {
    $parm = array(BUS_UNIT, $this->personID, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], $_POST['nickName']);
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
    $parm = $this->returnArguments();
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
      $this->nick_name = $row['FullName'];
    }
  }

  private function getTexts() {
    $parm = $this->returnArguments();
    $rs = $this->sqlTable->load('loadFullInstructions', $parm);
    foreach ($rs as $r) {
      $this->text_instructions = $r['Message_Text'];
    }
  }

  private function getFooterTexts() {
    $parm = $this->returnArguments();
    $rs = $this->sqlTable->load('loadInstructionsFooter', $parm);
    foreach ($rs as $r) {
      $this->instructions_footer = $r['Message_Text'];
    }
  }
}
?>
