<?php
include(CLASSES . 'main_contact.class.php');
$main_contact = new MainContact();
$main_contact->setYearPick($squares->getYearPick());
$main_contact->setEventType($squares->getEventType());
$main_contact->setPoolNumber($squares->getPoolNumber());
$main_contact->getMainContact();
?>
