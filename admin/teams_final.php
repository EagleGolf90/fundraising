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
      <p class="lead">Below is a form where you enter two teams at the Final or Championship.</p>
      <div id="message"></div>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="areaForm">
          <input type="text" name="bu" id="bu" value="<?php echo BUS_UNIT; ?>" hidden>
          <input type="text" name="yearPick" id="yearPick" value="<?php echo $squares->getYearPick(); ?>" hidden>
          <input type="text" name="eventType" id="eventType" value="<?php echo $squares->getEventType(); ?>" hidden>
          <input type="text" name="poolNumber" id="poolNumber" value="<?php echo $squares->getPoolNumber(); ?>" hidden>

          <div class="row g-3">
            <div class="col-5"><label for="showNames" class="form-label">Display Names on Squares?</label></div>
            <div class="col-7">
              <select class="form-select" id="showNames" name="showNames" tabindex="0" required>
                <option value="">Choose...</option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
              </select>
            </div>

            <div class="col-5"><label for="leftTeam" class="form-label">Left Area Team (AFC)</label></div>
            <div class="col-7">
              <select class="form-select" id="leftTeam" name="leftTeam" tabindex="1" required>
                <option value="">Choose...</option>
                <?php $squares->printConferenceTeams('AFC', 'left'); ?>
              </select>
            </div>

            <div class="col-5"><label for="topTeam" class="form-label">Top Area Team (NFC)</label></div>
            <div class="col-7">
              <select class="form-select" id="topTeam" name="topTeam" tabindex="2" required>
                <option value="">Choose...</option>
                <?php $squares->printConferenceTeams('NFC', 'top'); ?>
              </select>
            </div>

            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="button">Submit</button></div>
            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="21" id="clearAll" type="button">Clear All</button></div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
