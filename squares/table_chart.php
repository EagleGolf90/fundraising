  <hr>
  <div class="row">
    <div class="col-md-7">
      <table class="table table-bordered">
      <tr class="header">
        <td class="label">&nbsp;</td>
        <td class="column-100">Winner</td>
<?php
if ($reverse == 'Y') {
?>
        <td class="column-100">Reverse</td>
<?php
}
if ($FAB == 'Y') {
?>
        <td class="column-100">FAB (+5)</td>
<?php
}
if ($four_corners == 'Y') {
?>
        <td class="column-120">4 Corners</td>
<?php
}
if ($diamond_touch == 'Y') {
?>
        <td class="column-120">Diamond Touch</td>
<?php
}
?>
      </tr>
<?php
$costs = $squares->getAllCosts();
foreach ($costs as $cost) {
?>
      <tr class="text-center">
        <td class="label"><?php echo $cost['description']; ?></td>
        <td class="column-100">$<?php echo $cost['SquareCost']; ?></td>
<?php
  if ($reverse == 'Y') {
?>
        <td class="column-100">$<?php echo $cost['ReverseWinnerCost']; ?></td>
<?php
  }
  if ($FAB == 'Y') {
?>
        <td class="column-100">$<?php echo $cost['FABCost']; ?></td>
<?php
  }
  if ($four_corners == 'Y') {
?>
        <td class="column-120">$<?php echo $cost['DiamondTouchCost']; ?> each</td>
<?php
  }
  if ($diamond_touch == 'Y') {
?>
        <td class="column-120">$<?php echo $cost['DiamondTouchCost']; ?> each</td>
<?php
  }
?>
      </tr>
<?php
}
?>
      </table>
    </div>

    <div class="col-md-5">
      <?php if ($four_corners == 'Y') { ?>
      <img src="../images/corner_winner.png">
      <?php }
            if ($diamond_touch == 'Y') { ?>
      <img src="../images/diamond_touch.png">
      <?php } ?>
    </div>
  </div>
