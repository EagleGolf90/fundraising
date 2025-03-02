    <table class="table table-bordered table-hover">
<?php
    for ($a = 1; $a <= 4; $a++)
    {
      echo '<tr>';
      echo '<td>' . $rowTitle[$a-1] . '</td>';
      echo '<td>' . $a . '</td>';
      echo '</tr>' . "\n";
    }
?>
    </table>
