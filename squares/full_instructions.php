<?php foreach ($sqlTable->load('loadFullInstructions', $parm) as $row) { ?>
  <div class="row size18">
    <?php echo $row['Message_Text']; ?>
  </div>
<?php } ?>
