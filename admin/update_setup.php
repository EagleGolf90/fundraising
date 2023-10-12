<?php
include('../preload.php');

$sqlTable = new SQLTable();

include(CLASSES . 'squares.class.php');
$squares = new Squares();
die('ends here');
$texts = $squares->getSquareTexts();

$bus_unit = $_POST['bu'];

$diamond_winner = $_POST['diamond_winner'];
$reverse_winner = $_POST['reverse_winner'];

$total = 0;
$diamond_winner_total = 0;
$reverse_winner_total = 0;

$x = 1;
foreach ($_POST as $post) {
  if ($diamond_winner == "1") {
    $diamond_winner_amount = intval($_POST['diamond_winner' . $x]);
    $diamond_winner_total += (4 * $diamond_winner_amount);
  }
  if ($reverse_winner == "1") {
    $reverse_winner_amount = intval($_POST['reverse_winner' . $x]);
    $reverse_winner_total += $reverse_winner_amount;
  }
  $square_winner_amount = intval($_POST['square_winner' . $x]);
  $total += $square_winner_amount;

  if ($x <= 4) {
    echo 'Total for ' . $texts[$x-1] . ' = ' . $square_winner_amount . ', Diamond Winner: ' . $diamond_winner_amount . ', Reverse Winner: ' . $reverse_winner_amount . '<br/>';
    // $parm = array();
    // $ret = $sqlTable->execute('', $parm);
  }

  $x++;
}

$grand_total = ($total + $diamond_winner_total + $reverse_winner_total + intval($_POST['final_reverse_winner']));
echo 'Total: ' . $total . '<br/>';
echo 'Diamond Winner: ' . $diamond_winner_total . '<br/>';
echo 'Reverse Winner: ' . $reverse_winner_total . '<br/>';
echo 'Grand Total: ' . $grand_total . '<br/>';
?>
