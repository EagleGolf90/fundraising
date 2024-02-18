<?php
include('../preload.php');

include(HTML . 'beginHTML.php');

$boxes = comma_separated_to_array($_POST['BoxNumber']);

include(CLASSES . 'squares.class.php');
$squares = new Squares();
$squares->setBoxes($boxes);
$squares->setYearPick($_POST['YearPick']);
$squares->setEventType($_POST['EventType']);
$squares->setPoolNumber($_POST['PoolNumber']);
$squares->addParticipants();

include(INCLUDES . 'contacts.php');
?>

<div class="container">
  <div class="ctr">
    <h1><?php echo $squares->getEventTitle(); ?></h1>
<?php
if ($squares->howManyBoxesSelected() > 0) {
?>
    <h2><?php echo $_POST['nickName'] . ' selects box number ' . $squares->getBoxSelected(); ?></h2>
<?php
}

if ($squares->howManyBoxesExcluded() > 0) {
?>
    <h2>
      Someone took these box numbers <?php echo $squares->getBoxExcluded(); ?><br/><br/>
      You can either find <?php echo $squares->howManyBoxesExcluded(); ?> more <?php echo $squares->getBoxLabel(); ?> or leave alone.
    </h2>
<?php
}

include(INCLUDES . 'emails.php');
$send_email->setName($main_contact->getMainContactEmail());
$send_email->setFromEmailAddress($main_contact->getContactName());
$send_email->setToEmailAddress($_POST['email']);
$send_email->setContent($main_contact->getEmailContent());
$send_email->setSubject(BUS_UNIT . ' Squares');
$send_email->setFileAttached('');
?>
    <div class="text-center">
<?php $send_email->send(); ?>
      <h3><a href="index.php?bu=<?php echo strtolower(BUS_UNIT); ?>"><button type="button" class="btn btn-primary btn-lg">Back to Squares</button></a></h3>
    </div>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
