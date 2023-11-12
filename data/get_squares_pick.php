<?php
include('../preload.php');

$table_data = '<tr><td class="mainTitle" colspan="2"><h2>Squares Pick</h2></td></tr>' . "\n";

$sqlTable = new SQLTable();
$parm = array($_POST['yearPicked'], $_POST['eventType'], $_POST['poolNumber']);
$rows = $sqlTable->load('loadSquaresPick', $parm);

$fields = array('FullName', 'Square_Pick');

$table_data .= '<tr>';
for ($i = 0; $i < count($fields); $i++) {
  $table_data .= '<td class="table-header text-center">' . $fields[$i] . '</td>';
}
$table_data .= '</tr>';

$grand_total = 0;

foreach ($rows as $row) {
    $table_data .= '<tr>';
    for ($i = 0; $i < count($fields); $i++) {
        $table_data .= '<td class="text-center">' . $row[$fields[$i]] . '</td>';
    }
    $table_data .= '</tr>';

    $grand_total += 1;
}

$table_data .= '<tr><td class="text-end">Grand Total</td><td class="text-center">' . $grand_total . "</td></tr>\n";

echo $table_data;
?>
