<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <main>
    <form id="formData">
      <?php include(INCLUDES . 'key_options.php'); ?>

      <div class="row g-5">
        <div class="col-md-12">
          <table class="table table-bordered table-striped table-hover" id="tableInfo">
          <thead>
            <th class="text-center">Name</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Cost</th>
            <th class="text-center">Total</th>
          </thead>
          <tbody>
          </tbody>
          </table>
        </div>
      </div>
    </form>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
