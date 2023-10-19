<?php
include('../preload.php');

include(CLASSES . 'squares.class.php');
$squares = new Squares();
$rows = $squares->loadAllEmails();

include(HTML . 'beginHTML.php');
include(HTML . 'return_menu.php');
?>

<div class="container">
  <h2 id="ctr">Email Lists (<?php echo BUS_UNIT; ?>)</h2>
  <div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
    <tr>
      <td id="headerTitle"><b>Name</b></td>
      <td id="headerTitle"><b>Email</b></td>
    </tr>
<?php foreach ($rows As $row) { ?>
    <tr>
      <td>
        <?php
        if (empty($row['FirstName'])) {
          echo $row['NickName'];
        } else {
          echo $row['FirstName'] . ' ' . $row['LastName'];
        }
        ?>
      </td>
      <td><?php echo $row['EmailAddress']; ?></td>
    </tr>
<?php } ?>
    </table>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
