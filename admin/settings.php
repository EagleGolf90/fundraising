<?php
include('../preload.php');

$yearPlayed = $_GET['yr'];
$eventType = $_GET['event'];
$poolNumber = $_GET['pool'];
include(INCLUDES . 'squares.php');

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
          <?php include(INCLUDES . 'input_hidden.php'); ?>

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
