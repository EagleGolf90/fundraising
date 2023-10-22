  <?php
		/* Begin: DO NOT TOUCH OR ARRANGE */
		if ($squares->checkFullInstructions() == 'Y') {
			include('full_instructions.php');
		} else {
  ?>
  <div class="row">
    <div class="col-md-12">
      <div class="subContainer">
      <?php
			include('event_title.php');
			include('subheaders.php');
      ?>
      </div>
		</div>
	</div>
	<div class="row">&nbsp;</div>
  <?php
    include('instructions.php');
    include('contact_info.php');
  }
  /* End: DO NOT TOUCH OR ARRANGE */
  ?>
