<?php foreach ($sqlTable->load('loadTitleInstructions', $parm) as $row) { ?>
  <?php echo $row['Message_Text']; ?>
<?php } ?>
