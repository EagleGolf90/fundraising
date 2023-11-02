  <table class="table table-bordered table-striped">
  <tr><td>&nbsp;</td><td colspan="14"></td></tr>
<?php $index_arr = array(3, 2, 1, 0); // to have each Label reverse
      // Top Area
      for ($b = 4; $b >= 1; $b--) {
?>
  <tr>
    <td>&nbsp;</td>
<?php
        for ($t = 1; $t <= 4; $t++) {
?>
    <td>
      <?php 
      if ($b == 1)
        echo $box_area[$index_arr[$t-1]];
      else
        echo ($t == 4 ? $box_area[$b-1] : "");
      ?>
    </td>
<?php
        }
        for ($a = 1; $a <= 10; $a++) { ?>
    <td class="sblock"><?php echo $b; ?></td>
<?php
        }
?>
  </tr>
<?php }

// Left Area (4 columns) and 100 Square Boxes
$box = 1;
for ($x = 1; $x <= 10; $x++) {
?>
  <tr>
<?php if ($x == 1) { ?>
    <td rowspan="11">&nbsp;</td>
<?php }
      for ($z = 4; $z >= 1; $z--) { ?>
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
  </table>
