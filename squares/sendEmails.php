<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();

include(INCLUDES . 'contacts.php');

include(INCLUDES . 'emails.php');
$send_email->setFromEmailAddress('kdgaweb@outlook.com');
$send_email->setSubject($_POST['email_subject']);
//$send_email->setFileAttached('../files/SB_2022_Squares.pdf');
$send_email->setFileAttached('');
$email_content = $_POST['email_body'] . "<br/><br/>";
$send_email->setContent($email_content);

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <h3>Send Final Squares to Participants<br/><hr>

<?php
if ($send_email->getReadyForEmail() == 'Y') {
  $rows = $squares->loadPopulatePicks();

  $strSquares = '';
  $oldEmailAddress = '';
  $previousFullName = '';
  $previousFirstLast = '';
  $send_flag = true;

  foreach ($rows as $row) {
    if ($oldEmailAddress != $row['EmailAddress']) {
      if ($oldEmailAddress != '') {
        echo $previousFullName . ' - ' . $strSquares . '<br/>';
        $send_email->setToEmailAddress($row['EmailAddress']);
        $send_email->send();
        $strSquares = '';
      }
    }
    if ($strSquares != '') $strSquares .= ',';
    $strSquares .= $row['SquareNbr'];
    $oldEmailAddress = $row['EmailAddress'];
    $previousFullName = $row['FullName'];
    $previousFirstLast = $row['FirstName'] . ' ' . $row['LastName'];
    $send_flag = false;
  }

  if ($send_flag == false) {
    echo $previousFullName . ' - ' . $strSquares . '<br/>';
    $send_email->setToEmailAddress($oldEmailAddress);
    $send_email->send();
  }

  echo '<hr>';

  $send_email->emailComplete();
  $squares = null;
  echo '<h3>Notifications are completed.</h3>';
} else {
  echo '<h3>This is not ready.</h3>';
}

$send_email = null;
$main_contact = null;
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
