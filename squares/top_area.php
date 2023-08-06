<?php
$colspan = 10 + $draw_numbers;

if ($eventType == 5) {
?>
    <tr>
      <td></td>
      <td colspan='<?php echo $colspan; ?>'>
        <h2 class='title'>Winning</h2>
      </td>
    </tr>
<?php
} else {
?>
    <tr>
      <td></td>
      <td colspan='<?php echo $colspan; ?>'><h2 class='title'>
        <?php echo $squares->getShowNames() == 'Y' ? $squares->getTopTeam() : ''; ?></h2>
      </td>
    </tr>
<?php
    for ($y = $draw_numbers; $y > 1; $y--) {
      $squares->printEachQuarter($y, $draw_numbers);
    }
}
?>
