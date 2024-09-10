<?php
if (!isset($_POST['bu'])) die('Must have bu parameter. Please try again.');

include('../preload.php');
include(CLASSES . 'squares.class.php');
$squares = new Squares();
$email_sent = $squares->getMassEmails();

$location = SQUARES_URL . 'admin/send_form.php?bu=' . strtolower(BUS_UNIT);
$menus = '../menus/?bu=' . strtolower(BUS_UNIT);

if ($email_sent == 'Y') {
  echo '<h2><a href="send_form.php?bu=' . strtolower(BUS_UNIT) . '">Go Back</a></h2>';
  die('Already sent out. Make sure you uncheck Mass Emails before sending out.');
}

switch ($_POST['checkAllEmails']) {
  case '1':
    $rows = $squares->loadAllEmails();
    break;
  case '2':
    $rows = $squares->loadCurrentEmails();
    break;
}

include(INCLUDES . 'emails.php');
$send_email->setSubject($_POST['email_subject']);
$send_email->setFileAttached('');
$body_message = $_POST['body_message'];

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <h2><?php echo $_POST['email_subject']; ?></h2>
  <h4><?php echo $_POST['fromAddress']; ?></h4>
  <p><?php echo $_POST['body_message']; ?></p><br/>

  <table class="table table-bordered table-hover">
  <tr><td>Name</td><td>Email</td><td>Status</td></tr>
  <?php
  $counts = 0;
  foreach ($rows as $row) {
    $name = $row['NickName'] != '' ? $row['NickName'] : $row['FirstName'] . ' ' . $row['LastName'];
  
    $send_email->setContent($body_message);
    $send_email->setToEmailAddress($row['EmailAddress']);
    $return_flag = $send_email->send();
    $status = $return_flag ? 'Sent' : 'Not able to send';
  ?>
  <tr>
    <td><?php echo $name; ?></td>
    <td><?php echo $row['EmailAddress']; ?></td>
    <td><?php echo $status; ?></td>
  </tr>
  <?php
    $squares->addEmailSent(array(strtolower($row['EmailAddress']), $status));
  }
  ?>
  </table>
</div>

<a href="<?php echo $location; ?>">Return to Email Form</a><br/>
<a href="<?php echo $menus; ?>">Return to Main Menu</a>

<?php
$squares->endEmails();
include(HTML . 'endHTML.php');
?>
