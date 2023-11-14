<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();
$mass_emails = $squares->getMassEmails();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2><?php echo BUS_UNIT; ?> Settings</h2>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="areaForm" method="post" action="update_settings.php">
          <input type="text" name="bu" id="bu" value="<?php echo BUS_UNIT; ?>" hidden>
          <input type="text" name="yearPick" id="yearPick" value="<?php echo $squares->getYearPick(); ?>" hidden>
          <input type="text" name="eventType" id="eventType" value="<?php echo $squares->getEventType(); ?>" hidden>
          <input type="text" name="poolNumber" id="poolNumber" value="<?php echo $squares->getPoolNumber(); ?>" hidden>

          <div class="row">
            <div class="col-12">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="massEmails" name="massEmails" value="Y" <?php echo $mass_emails == 'Y' ? ' checked="checked"' : ''; ?>>
                <label for="massEmails" class="form-check-label">Emails Sent?</label>
              </div>
            </div>
          </div>

          <div class="col-12">
            <button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
