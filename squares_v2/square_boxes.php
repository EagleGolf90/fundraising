  <table class="table table-bordered table-striped">
<?php for ($b = 1; $b <= 4; $b++) { ?>
  <tr>
<?php   for ($t = 1; $t <= 4; $t++) { ?>
    <td>&nbsp;</td>
<?php   }
        for ($a = 1; $a <= 10; $a++) { ?>
    <td><?php echo $b; ?></td>
<?php   } ?>
  </tr>
<?php } ?>
<?php
$box = 1;
for ($x = 1; $x <= 10; $x++) {
?>
  <tr>
<?php for ($z = 4; $z >= 1; $z--) { ?>
    <td><?php echo $z; ?></td>
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
