<?php
include('../preload.php');

$sqlTable = new SQLTable();
$parm = array($_POST['yearPicked'], $_POST['eventType'], $_POST['poolNumber']);
$rows = $sqlTable->load('getSquarePayments', $parm);
$table_data = '<tr><td class="text-center">Name</td><td class="text-center">Qty</td>';
$table_data .= '<td class="text-center">Cost</td><td class="text-center">Total</td></tr>';
$grand_total = 0;

foreach ($rows as $row) {
    $fullName = empty($row['NickName']) ? $row['FirstName'] . ' ' . $row['LastName'] : $row['NickName'];

    $full_name = '<td>' . $fullName .'</td>';
    $qty = '<td class="text-center">' . $row['Qty'] . '</td>';
    $cost = '<td class="text-center">' . $row['Cost'] . '</td>';
    $total = '<td class="text-center">' . $row['Total'] . '</td>';

    $table_data .= '<tr>' . $full_name . $qty . $cost . $total . "</tr>\n";
    $grand_total += $row['Total'];
}

$table_data .= '<tr><td colspan="3" class="text-right">Grand Total</td><td class="text-center">' . $grand_total . "</td></tr>\n";

echo $table_data;
?>
