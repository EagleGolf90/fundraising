<?php
include('../preload.php');

$bus_unit = $_GET['bu'];
$yearPlayed = $_GET['yr'];
$eventType = $_GET['event'];
$poolNumber = $_GET['pool'];
include(INCLUDES . 'squares.php');
$squares->setNames($_GET['id']);

$first_name = $squares->getFirstName();
$last_name = $squares->getLastName();
$nick_name = $squares->getNickName();
$square_boxes = $squares->getSquares();
$saved_squares = $squares->getSavedSquares();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Edit Squares</h2>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="areaForm" action="update_squares.php" method="post">
          <?php include(INCLUDES . 'input_hidden.php'); ?>
          <input type="text" name="id" value="<?php echo $_GET['id']; ?>" hidden>
          <input type="text" name="cost" value="<?php echo $squares->getCost(); ?>" hidden>
          <input type="text" name="saved_squares" value="<?php echo $saved_squares; ?>" hidden>

          <div class="row g-3">
            <table class="table table-bordered table-striped">
            <tr>
                <td class="edit_row">Name</td>
                <td><input type="text" name="nickName" class="form-control" id="nickName" value="<?php echo $nick_name; ?>">
            </tr>
<?php $x = 0;
      foreach ($square_boxes as $boxes) {
?>
            <tr>
              <td class="edit_row">Square #<?php echo $x+1; ?></td>
              <td><input type="text" name="squares[]" class="form-control" value="<?php echo $boxes['SquareNbr']; ?>"></td>
              <td class="edit_row">&nbsp;</td>
            </tr>
<?php   $x++;
      } ?>
            </table>

            <div class="col-12">&nbsp;</div>

            <div class="col-12">
              <button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitBtn" type="submit">Submit</button>
              <button class="w-100 btn btn-danger btn-lg" tabindex="21" id="cancelBtn" type="button">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
