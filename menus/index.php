<?php
include('../preload.php');
include(HTML . 'beginHTML.php');

include(INCLUDES . 'squares.php');

$sqlTable = new SQLTable();
?>
<div class="container">
  <h2><?php echo strtoupper($_GET['bu']); ?> Main Menu</h2>
<?php
$counts = 1;
$rows = $sqlTable->load('loadMenus', array());
foreach ($rows As $row) {
  if(strpos($row['URL'], '?') !== false) {
    $symbol = '&';
  } else {
    $symbol = '?';
  }
  $url_menu = SQUARES_URL . $row['URL'] . $symbol . 'bu=' . strtolower(BUS_UNIT);

  if ($counts == 1 || $counts % 2 == 1) echo '<div class="row">' . "\n";
?>
    <div class="col-6">
      <a class="links" href="<?php echo $url_menu; ?>">
        <div class="card <?php echo $row['TagName']; ?> text-white mb-3 full">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['Title'] . ($row['Admin'] == 'Y' ? ' (for Admin only)' : ''); ?></h5>
          </div>
        </div>
      </a>
    </div>
<?php
  if ($counts % 2 == 0) echo '</div>' . "\n";
  $counts++;
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
