<?php
include('../preload.php');

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2><?php echo BUS_UNIT; ?> Setup Host Form</h2>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="hostForm">
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
              </select>
            </div>

            <div class="col-5"><label for="topTeam" class="form-label">Top Area Team (NFC)</label></div>
            <div class="col-7">
              <select class="form-select" id="topTeam" name="topTeam" tabindex="2" required>
                <option value="">Choose...</option>
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
