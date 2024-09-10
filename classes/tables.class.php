<?php
class SQLTable extends DB {
  public function load($sqlName, $parm) {
    $sql = SQL::getSQL($sqlName, $parm);
    if (!isset($sql)) die('Invalid SQL Name: ' . $sqlName);
    $rs = $this->select($sql);

    $sql_select = '';
    foreach ($rs As $r) $sql_select = $r['Statement'];

    $sql_select = SQL::replaceParameters($sql_select, $parm);
    if (!isset($sql_select)) die('Invalid SQL statement: ' . $sql_select);

    if (DEBUG_FLAG == true) echo '...Statement (' . $sqlName . '): ' . $sql_select . '<br/>';

    return $this->select($sql_select);
  }

  private function getStatement($SQLName, $arr) {
    $sql_temp = SQL::getSQL($SQLName);
    if (!isset($sql_temp)) die('Invalid SQL Name: ' . $SQLName);
    $rs = $this->select($sql_temp);

    $sql_statement = '';
    foreach ($rs As $r) $sql_statement = $r['Statement'];

    $statement = SQL::replaceParameters($sql_statement, $arr);
    if (!isset($statement)) die('Invalid SQL statement: ' . $statement);

    return $statement;
  }

  public function execute($name, $parm) {
    $sql = $this->getStatement($name, $parm);
    if (DEBUG_FLAG == true) echo '...Statement (' . $name . '): ' . $sql . '<br/>';
    if ($this->checkSQLNames($name)) $this->addSQLToLogFile($sql, $parm);
    return DB::execute($sql);
  }

  public function loadTranslate($sqlName, $parm) {
    $rows = $this->load($sqlName, $parm);
    $tempDescr = '';
    foreach ($rows as $row) $tempDescr = $row['LongName'];
    return $tempDescr;
  }

  private function checkSQLNames($name) {
    $flag = false;
    switch ($name) {
      case 'insertParticipants':
      case 'insertPeoplePicks':
      case 'insertPayments':
      case 'updateEndEmails':
        $flag = true;
        break;
    }
    return $flag;
  }

  private function addSQLToLogFile($sql, $parm) {
    $filename = LOGS_DIR . date('Y') . '/' . strtolower(BUS_UNIT) . '_' . date('Y-m-d') . '.log';
    $myfile = fopen($filename, "a") or die("Unable to open file!");
    fwrite($myfile, "Date/Time: " . date("Y-m-d h:i:sa") . "\n");
    fwrite($myfile, 'ID: ' . $parm[0] . "\n");
    fwrite($myfile, $sql . "\n");
    fclose($myfile);
  }
}
?>
