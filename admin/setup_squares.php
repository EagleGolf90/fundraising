<?php
if (!isset($_GET['bu'])) die('Must have bu parameter. Please try again.');

include('../preload.php');
include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container-xl">
  <main>
    <div class="row g-9 text-center">
      <div class="py-2 text-center">
        <h2>KDGA Setup Form</h2>
      </div>

      <div class="col-md-7 col-lg-8">
        <form class="areaForm" action="update_setup.php" method="post">
          <input type="text" name="bu" id="bu" value="<?php echo strtoupper($_GET['bu']); ?>" hidden>
          <div class="row g-2">
            <?php include('setup_header.php'); ?>
            <hr>
            <?php
            include('squares_header.php');
            include('pick_labels.php');

            for ($section_number = 1; $section_number <= 4; $section_number++) {
              include('squares_form_details.php');
            }

            include('reverse_winner_section.php');
            ?>

            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="submit">Submit</button></div>
            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="21" id="clearAll" type="button">Clear All</button></div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
