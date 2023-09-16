<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();

if ($squares->getShowNames() == 'N') {
	include(HTML . 'beginHTML.php');

	if ($squares->openForPublic() == true) {
    include(INCLUDES . 'contacts.php');
	?>

	<div class="container">
		<?php
		/* Begin: DO NOT TOUCH OR ARRANGE */
		$fullInstruction = $squares->checkFullInstructions();
		if ($fullInstruction == 'Y') {
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
		<div class="text-center">
			<form action="main_squares.php" method="post">
				<?php include('input_hidden.php'); ?>
				<button type="submit" class="btn btn-primary btn-lg fcc-btn">Proceed to Squares</button>
			</form>
		</div>
	</div>

	<?php
	} else {
	?>
		<h2><?php echo BUS_UNIT; ?> Squares is not open yet. Please come back again.</h2>
	<?php
	}

	include(HTML . 'endHTML.php');
} else {
	$main_url = 'https://kdga.org/fundraising/squares/main_squares.php?bu=' . strtolower($_GET['bu']);
	$location = "Location: " . $main_url;
	header($location);
	exit;	
}
?>
