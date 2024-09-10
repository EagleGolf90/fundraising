<?php
include(CLASSES . 'squares_payments.class.php');
$payment = new SquaresPayments();
$payment->setBusinessUnit($_GET['bu']);
$payment->setYearPick($_GET['yr']);
$payment->setEventType($_GET['event']);
$payment->setPoolNumber($_GET['pool']);
$payment->setup();
?>