<?php
class Logs {
  private $logFile = null;
  
  public function __construct() { $this->createFile(); }

  private function createFile() {
    $fileName = LOGS_DIR . date('Y-m-d') . '.log';
    $file_exists_flag = false;
    if (!file_exists($fileName)) $file_exists_flag = true;
    $this->logFile = fopen($fileName, "a");
    if ($file_exists_flag) $this->writeLog('Start Log');
  }

  public function writeLog($message) {
    $message = date('Y-m-d h:i:s A') . ' >>>> ' . $message . PHP_EOL;
    fwrite($this->logFile, $message);
  }
}
?>
