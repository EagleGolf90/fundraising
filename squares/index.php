<?php
include('../preload.php');

include(INCLUDES . 'squares.php');

if ($squares->getShowNames() == 'N') {
	if ($squares->openForPublic() == true) {
    $diamond_touch = $squares->getDiamondTouch();
    $four_corners = $squares->getFourCorners();
    $reverse = $squares->getReverseWinners();
    $FAB = $squares->getFAB5();

    include(INCLUDES . 'contacts.php');

    include(HTML . 'beginHTML.php');
?>

<div class="container">
  <?php include('front_page.php'); ?>

  <hr>
  <div class="row">
    <div class="col-md-12">
			<form action="main_squares.php" method="post">
				<?php include('input_hidden.php'); ?>
				<button type="submit" class="btn btn-primary btn-lg fcc-btn">Proceed to Squares</button>
			</form>
    </div>
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
