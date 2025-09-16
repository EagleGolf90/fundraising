<?php
if ($fullInstructionFlag == 'Y') {
  include('front_title.php');
  include('full_instructions.php');
  include('payment_info.php');
} else {
  include('front_picture.php');
}
?>
