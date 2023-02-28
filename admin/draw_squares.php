<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2><?php echo BUS_UNIT; ?> Squares Form - Pool <?php echo $squares->getPoolNumber(); ?></h2>
      <h3><?php echo $squares->getEventTitle(); ?></h3>
      <p class="lead">Below is a form where you enter drawing number for top and left areas on this squares.</p>
      <div id="message"></div>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="areaForm">
          <input type="text" name="bu" value="<?php echo BUS_UNIT; ?>" hidden>
          <input type="text" name="yearPick" value="<?php echo $squares->getYearPick(); ?>" hidden>
          <input type="text" name="eventType" value="<?php echo $squares->getEventType(); ?>" hidden>
          <input type="text" name="poolNumber" value="<?php echo $squares->getPoolNumber(); ?>" hidden>

          <div class="row g-3">
            <div class="col-3"><label for="quarter" class="form-label">Quarter</label></div>
            <div class="col-9">
              <select class="form-select" id="quarter" name="quarter" tabindex="0" required>
                <option value="">Choose...</option>
                <option value="1">First Quarter</option>
                <option value="2">Second Quarter</option>
                <option value="3">Third Quarter</option>
                <option value="4">Final Quarter</option>
              </select>
            </div>

            <div class="col-sm-6"><h4 class="mb-3 text-center">Left Area</h4></div>
            <div class="col-sm-6"><h4 class="mb-3 text-center">Top Area</h4></div>

<?php
$leftTabIndex = 1;
$topTabIndex = 11;
for ($x = 1; $x <= 10; $x++) {
  $leftColumn = 'left_column' . $x;
  $topColumn = 'top_column' . $x;
?>
            <div class="col-3"><label for="<?php echo $leftColumn; ?>" class="form-label">Column <?php echo $x; ?></label></div>
            <div class="col-3"><input type="number" required min="0" max="9" class="form-control" tabindex="<?php echo $leftTabIndex; ?>" id="<?php echo $leftColumn; ?>" name="<?php echo $leftColumn; ?>"></div>

            <div class="col-3"><label for="<?php echo $topColumn; ?>" class="form-label">Column <?php echo $x; ?></label></div>
            <div class="col-3"><input type="number" required min="0" max="9" class="form-control" tabindex="<?php echo $topTabIndex; ?>" id="<?php echo $topColumn; ?>" name="<?php echo $topColumn; ?>"></div>

<?php
  $leftTabIndex += 1;
  $topTabIndex += 1;
}
?>

            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="button">Submit</button></div>
            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="21" id="clearAll" type="button">Clear All</button></div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
