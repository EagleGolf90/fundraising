<?php
$aindex = array(3, 2, 1, 0); // to have each Label reverse
// Top Area
for ($b = 4; $b >= 1; $b--) {
?>
  <tr>
    <td>&nbsp;</td>
<?php
  for ($t = 1; $t <= 4; $t++) {
?>
    <td class="blank">
    <?php 
    if ($b == 1)
      echo $box_area[$aindex[$t-1]];
    else
      echo ($t == 4 ? $box_area[$b-1] : "");
    ?>
    </td>
<?php
  }
  for ($a = 1; $a <= 10; $a++) {
?>
    <td class="sblock"><?php echo $b; ?></td>
<?php
  }
?>
  </tr>
<?php
}
?>
