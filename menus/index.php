<?php
include('../preload.php');
include(HTML . 'beginHTML.php');

include(INCLUDES . 'squares.php');

$sqlTable = new SQLTable();
?>
<div class="container">
  <h2><?php echo $squares->getBusinessUnitTitle(); ?><br/>Main Menu</h2>
<?php
$rows = $sqlTable->load('loadMenus', array());
foreach ($rows As $row) {
  if(strpos($row['URL'], '?') !== false) {
    $symbol = '&';
  } else {
    $symbol = '?';
  }
  $url_menu = SQUARES_URL . $row['URL'] . $symbol . 'bu=' . strtolower(BUS_UNIT);
?>
  <div class="row">
    <div class="col-12">
      <a class="links" href="<?php echo $url_menu; ?>">
        <div class="card <?php echo $row['TagName']; ?> text-white mb-3 full">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['Title'] . ($row['Admin'] == 'Y' ? ' (for Admin only)' : ''); ?></h5>
          </div>
        </div>
      </a>
    </div>
  </div>
<?php
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
