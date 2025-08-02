<?php
include(CLASSES . 'emails.class.php');
$send_email = new Email($_POST['YearPick'], $_POST['EventType'], $_POST['PoolNumber']);
?>
