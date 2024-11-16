    <div class="row">
      <div class="col-md-12">
        <div class="subContainer size18 text-center">
          <h2><?php echo $eventTitle; ?></h2>
        </div>
      </div>
    </div>

    <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="<?php echo ($divideBy+$columns+2); ?>">
        <h2 class="title"><?php echo $nfcTeamName; ?></h2>
      <td>
    </tr>
    <?php include(INCLUDES . 'squares_header.php'); ?>
    </table>

    <table class="table table-bordered table-hover" width="200px" cellspacing="1" cellpadding="1">
    <?php include(INCLUDES . 'squares_footer.php'); ?>
    </table>
