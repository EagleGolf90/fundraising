<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();

include(INCLUDES . 'contacts.php');

include(HTML . 'beginHTML.php');

include('event_title.php');
?>

<div class="container">
  <h2 id="ctr">You selected Square box # <?php echo $_GET['box']; ?></h2>
  <h3 id="ctr"><?php echo $squares->calculateAmounts($main_contact->getContactCashApp(), $main_contact->getDeadline()); ?></h3>

  <div class="form-style-10">
    <h1>Register <?php echo $squares->getEventTitle(); ?></h1>
    <form action="sendSquare.php" method="POST">
      <input type="hidden" name="BoxNumber" value="<?php echo $_GET['box']; ?>" />
      <input type="hidden" name="bu" value="<?php echo $_GET['m']; ?>" />
      <?php include('input_hidden.php'); ?>
      <div class="section"><span>1</span>Name</div>
      <div class="inner-wrap">
        <label>First Name <input type="text" name="firstName" id="firstName" required /></label>
        <label>Last Name <input type="text" name="lastName" id="lastName" required /></label>
      </div>

      <div class="section"><span>2</span>Email</div>
      <div class="inner-wrap">
        <label>Email Address <input type="email" name="email" id="email" required /></label>
      </div>

      <div class="button-section">
       <button type="submit" name="SignUp" id="SignUp" class="btn btn-primary btn-lg fcc-btn">Submit</button>
       <span class="privacy-policy">
         <input type="checkbox" name="terms" class="terms">You agree to our Terms.
       </span>
      </div>
    </form>
  </div>
  <div class="form-style-10 text-center">
    <a href="main_squares.php" class="fcc-btn"><button type="button" class="btn btn-primary btn-log fcc-btn">Cancel and return to Squares</button></a>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
