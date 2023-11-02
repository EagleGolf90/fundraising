<?php
include(CLASSES . 'main_contact.class.php');
$main_contact = new MainContact($squares->getYearPick(), $squares->getEventType(), $squares->getPoolNumber());
$main_contact->getMainContact();
?>
