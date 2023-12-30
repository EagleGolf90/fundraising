<?php
$zelle_flag = $main_contact->getZelleFlag();
$cashApp_flag = $main_contact->getCashAppFlag();
$payment_app = '';
$payment_label = '';
if ($cashApp_flag == 'Y') {
  $payment_app = $main_contact->getMainCashApp();
  $payment_label = 'CashApp';
}
if ($zelle_flag == 'Y') {
  $payment_app = $main_contact->getMainZelle();
  $payment_label = 'Zelle';
}
?>
  <hr>
  <div class="row">
    <div class="col-md-12 size18">
      Contact this text number <?php echo $main_contact->getContactPhone(); ?> if you have any questions.<br/>
      <span class="size25">>>>></span> 
      <b>Deadline: <?php echo $squares->getDeadline(); ?>.</b> Pay through "<?php echo $payment_label; ?>" at 
      <b><?php echo $payment_app; ?></b> <span class="size25"><<<<</span>
    </div>
  </div>
