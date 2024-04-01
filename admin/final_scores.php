<?php
include('../preload.php');

include(CLASSES . 'squares_winners.php');
$winner = new Square_Winners();

$rows_round = $winner->getRounds();
$rows_college = $winner->getColleges();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Enter Final Scores</h2>
    </div>

    <div class="row g-7 text-center">
      <div class="col-md-7 col-lg-8">
        <form class="areaForm">
          <?php include(INCLUDES . 'input_hidden.php'); ?>

          <div class="row g-3">
            <div class="col-3"><label for="round" class="form-label">Round:</label></div>
            <div class="col-6">
              <select class="form-select" id="round" name="round" tabindex="0" required>
                <option value="">Choose...</option>
<?php foreach ($rows_round as $round) { ?>
                <option value="<?php echo $round['QuarterRound']; ?>"><?php echo $round['Description']; ?></option>
<?php } ?>
              </select>
            </div>
            <div class="col-3">&nbsp;</div>

            <div class="row g-3">
            <div class="col-3"><label for="game" class="form-label">Game #:</label></div>
            <div class="col-6">
              <select class="form-select" id="game" name="game" tabindex="0" required>
                <option value="">Choose...</option>
<?php for ($a = 1; $a <= 32; $a++) { ?>
                <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
<?php } ?>
              </select>
            </div>
            <div class="col-3"><label for="winningTeam" class="form-label">Scores</label></div>

            <div class="col-3"><label for="winningTeam" class="form-label">Winning Team</label></div>
            <div class="col-6">
              <select class="form-select" id="winningTeam" name="winningTeam" tabindex="1" required>
                <option value="">Choose...</option>
<?php foreach ($rows_college as $college) { ?>
                <option value="<?php echo $college['Team']; ?>"><?php echo $college['Description']; ?></option>
<?php } ?>
              </select>
            </div>
            <div class="col-3"><input type="number" required min="10" max="150" class="form-control" tabindex="2" id="winningScore" name="winningScore"></div>

            <div class="col-3"><label for="losingTeam" class="form-label">Losing Team</label></div>
            <div class="col-6">
              <select class="form-select" id="losingTeam" name="losingTeam" tabindex="2" required>
                <option value="">Choose...</option>
<?php foreach ($rows_college as $college) { ?>
                <option value="<?php echo $college['Team']; ?>"><?php echo $college['Description']; ?></option>
<?php } ?>
              </select>
            </div>
            <div class="col-3"><input type="number" required min="10" max="150" class="form-control" tabindex="2" id="losingScore" name="losingScore"></div>

            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="20" id="submitForm" type="button">Submit</button></div>
            <div class="col-6"><button class="w-100 btn btn-primary btn-lg" tabindex="21" id="clearAll" type="button">Clear All</button></div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
