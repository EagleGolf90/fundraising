<?php
if ($fullInstructionFlag == 'Y') {
  include('full_instructions.php');
} else {
  include('header.php');
  include('sub_instruction.php');
  include('table_chart.php');
}
include('payment_info.php');
?>
