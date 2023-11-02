<?php
if (!isset($_POST['bu'])) die('Must have bu parameter. Please try again.');

include('../preload.php');
include(CLASSES . 'squares.class.php');
$squares = new Squares();

switch ($_POST['checkAllEmails']) {
  case '1':
    $rows = $squares->loadAllEmails();
    break;
  case '2':
    $rows = $squares->loadCurrentEmails();
    break;
}

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <table class="table table-bordered table-hover">
  <tr><td>Name</td><td>Email</td></tr>
  <?php
  foreach ($rows as $row) {
    $name = $row['NickName'] != '' ? $row['NickName'] : $row['FirstName'] . ' ' . $row['LastName'];
  ?>
  <tr><td><?php echo $name; ?></td><td><?php echo $row['EmailAddress']; ?></td></tr>
  <?php
  }
  ?>
  </table>
</div>

<?php include(HTML . 'endHTML.php'); ?>
