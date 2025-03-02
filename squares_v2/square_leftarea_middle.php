<?php
// Left Area (4 columns) and 100 Square Boxes
$box = 1;
for ($x = 1; $x <= 10; $x++) {
?>
  <tr>
<?php if ($x == 1) { ?>
    <td rowspan="11">&nbsp;</td>
<?php }
      for ($z = 4; $z >= 1; $z--) {
?>
    <td class="tblock"><?php echo $z; ?></td>
<?php
  }
  for ($y = 1; $y <= 10; $y++) {
?>
    <td><?php echo $box++; ?></td>
<?php
  }
?>
  </tr>
<?php
}
?>
