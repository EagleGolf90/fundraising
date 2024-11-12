    <table class="table table-bordered table-hover" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="<?php echo ($divideBy+$columns+1); ?>">
        <h2 class="title"><?php echo $eventTitle; ?></h2>
      <td>
    </tr>
    <?php
    /* Print 100 Squares */
    $rowBreak = 4;
    $tRow = 30;
    $sRow = 4;
    for ($row_count = 1; $row_count <= $xRows; $row_count++)
    {
      echo '<tr>' . "\n";
      //include(INCLUDES . 'squares_header.php');

      /*
      $tags = array('', 'Selected', 'Taken', 'Pending');
      $rowTitle = array('1st', '2nd', '3rd', 'Final');
      $rowTags = array('first','second','third','fourth');
      */
      for ($y = 4; $y > 0; $y--) {
        if ($tags[$y] != '') {
          echo '<td></td>' . "\n";
          echo '<td class="blank ' . strtolower($tags[$y]) . ' Title">' . $tags[$y] . '</td>' . "\n";
          echo '<td class="blank" id="' . $rowTags[$y] . '">' . $rowTitle[$y] . '</td>' . "\n";
        }
        for ($x = 1; $x < 10; $x++) {
          echo '<td class="tblock" id="' . $id_topTag . '">';
        }
      }

      for ($column_count = 1; $column_count <= $yRows; $column_count++)
      {
        if (in_array($squareNo, $picked))
          echo '<td style="background-color:red">';
        else
          echo '<td>';
        echo $squareNo . '</td>' . "\n";
        $squareNo++;
      }
      echo '</tr>' . "\n";
    }
    ?>
    </table>
