  <hr>
<?php
$subs = $squares->getSubInstructions();
foreach ($subs as $sub) {
?>
  <div class="row">
    <div class="col-md-12">
      <span class="size18 bold_text"><?php echo $sub['Message']; ?></span>
    </div>
  </div>
<?php
}
?>
