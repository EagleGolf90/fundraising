<?php
include('../preload.php');

$table_data = '<tr><td class="mainTitle" colspan="5"><h2>Payments</h2></td></tr>' . "\n";

$sqlTable = new SQLTable();
$parm = array($_POST['yearPicked'], $_POST['eventType'], $_POST['poolNumber']);
$rows = $sqlTable->load('getSquarePayments', $parm);

$fields = array('Name', 'Qty', 'Cost', 'Total');

$table_data .= '<tr>';
for ($i = 0; $i < count($fields); $i++) {
  $table_data .= '<td class="table-header text-center">' . $fields[$i] . '</td>';
}
$table_data .= '<td class="table-header text-center">&nbsp;</td>';
$grand_total = 0;

foreach ($rows as $row) {
    $table_data .= '<tr>';
    for ($i = 0; $i < count($fields); $i++) {
        $table_data .= '<td class="text-center">' . $row[$fields[$i]] . '</td>';
    }
    //?id=216&event=1&paid=Y&bu=kdga
    $table_data .= '<td class="text-center"><a href="../admin/receivePay.php?bu=' . BUS_UNIT . '&id=' . $row['PersonID'] . '&event=' . $row['EventType'] . '">Delete</a></td>';
    $table_data .= '</tr>' . "\n";

    $grand_total += $row['Total'];
}

$table_data .= '<tr><td colspan="4" class="text-end">Grand Total</td><td class="text-center">' . $grand_total . "</td></tr>\n";

echo $table_data;
?>
