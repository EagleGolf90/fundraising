<?php
class AjaxTable {
  private $sqlTable;
  private $ajaxTable;

  public function __construct() { $this->sqlTable = new SQLTable(); }

  public function getAjaxTable() { return $this->ajaxTable; }

  public function setup() {
    $rows = $this->sqlTable->load('loadAjaxTable', array(''));
  }
}
?>
