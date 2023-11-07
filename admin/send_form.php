<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();
$emailAddress = $squares->getMainEmailAddress();
$eventTitle = $squares->getEventTitle();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2><?php echo $eventTitle; ?><br/><?php echo strtoupper($_GET['bu']); ?> Fundraising</h2>
    </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Send Email</h4>
        <form class="needs-validation" method="post" action="sends.php">
          <input type="hidden" name="bu" value="<?php echo $_GET['bu']; ?>">
          <input type="hidden" class="form-control" id="fromAddress" name="fromAddress" value="<?php echo $emailAddress; ?>">
          <div class="row g-3">
            <div class="col-sm-4">
              <label for="fromAddress" class="form-label">Email From</label><br/>
              <label for="fromAddress"><?php echo $emailAddress; ?></label>
            </div>

            <div class="col-sm-8">
              <label for="email_subject" class="form-label">Subject</label>
              <input type="text" class="form-control" id="email_subject" name="email_subject" value="" required>
            </div>
          </div>

          <hr class="my-4">

          <div class="my-3">
            <div class="form-check">
              <input id="option1" name="checkAllEmails" type="radio" class="form-check-input" value="1" checked required>
              <label class="form-check-label" for="credit">Past and Current Emails</label>
            </div>
            <div class="form-check">
              <input id="option2" name="checkAllEmails" type="radio" class="form-check-input" value="2" required>
              <label class="form-check-label" for="debit">Current Emails</label>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Body Message</h4>

          <div class="my-3">
            <div class="form-check">
              <textarea id="body_message" name="body_message" class="form-control" required rows="8" cols="80"></textarea>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
