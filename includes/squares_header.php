<?php
    /* Print 100 Squares */
    $rowBreak = 4;
    $tRow = 30;
    $sRow = 4;
    for ($y = 4; $y > 0; $y--) {
      echo '<tr>';
      if ($tags[$y-1] != '') {
        echo '<td></td>' . "\n";
        echo '<td class="blank ' . strtolower($tags[$y-1]) . ' Title" colspan="3">' . $tags[$y-1] . '</td>' . "\n";
        echo '<td class="blank" id="' . $rowTags[$y-1] . '">' . $rowTitle[$y-1] . '</td>' . "\n";
      } else {
        echo '<td rowspan="11"><h2 class="rotate title">' . $afcTeamName . '</h2></td>' . "\n";
        echo '<td class="blank">' . $rowTitle[3] . '</td>' . "\n";
        echo '<td class="blank">' . $rowTitle[2] . '</td>' . "\n";
        echo '<td class="blank">' . $rowTitle[1] . '</td>' . "\n";
        echo '<td class="blank">' . $rowTitle[0] . '</td>' . "\n";
      }
      for ($x = 1; $x <= 10; $x++) {
        echo '<td class="tblock" id="' . $id_topTag . '">';
      }
      echo '</tr>' . "\n";
    }

    for ($row_count = 1; $row_count <= $xRows; $row_count++)
    {
      echo '<td class="blank"></td>' . "\n";
      echo '<td class="blank"></td>' . "\n";
      echo '<td class="blank"></td>' . "\n";
      echo '<td class="blank"></td>' . "\n";

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
