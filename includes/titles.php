<?php
/*
 * Program File: titles.php
 * Author......: Brian Timberlake
 * Date Created: October 18, 2021
 * Description.: This program is to get a title based on a page.
 */
define('GET_TITLE', 'getTitles');
define('GET_PROGRAM', 'getProgram');

class Titles {
  private $sqlTable;

  public function __construct() { $this->sqlTable = new SQLTable(); }

  public function getPageTitle($pageName) {
    $rows = $this->sqlTable->load(GET_TITLE, array($pageName));
    $pageTitle = '';
    foreach ($rows as $row) $pageTitle = $row['PageTitle'];
    return $pageTitle;
  }

  public function getProgramNames($title) {
    $rows = $this->sqlTable->load(GET_PROGRAM, array($title));
    $programName = '';
    foreach ($rows as $row) $programName = $row['ProgramName'];
    return $programName;
  }
}
?>
