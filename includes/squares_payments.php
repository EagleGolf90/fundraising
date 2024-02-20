<?php
include(CLASSES . 'squares_payments.class.php');
$payment = new SquaresPayments();
$payment->setYearPick($_GET['yr']);
$payment->setEventType($_GET['event']);
$payment->setPoolNumber($_GET['pool']);
$payment->setup();
?>