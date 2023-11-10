<?php
include('../preload.php');

$sqlTable = new SQLTable();
$parm = array($_POST['yearPicked'], $_POST['eventType'], $_POST['poolNumber']);
$rows = $sqlTable->load('getSquarePayments', $parm);
$table_data = '';
$grand_total = 0;

foreach ($rows as $row) {
    $fullName = empty($row['NickName']) ? $row['FirstName'] . ' ' . $row['LastName'] : $row['NickName'];

    $full_name = '<td>' . $fullName .'</td>';
    $qty = '<td style="text-align: center">' . $row['Qty'] . '</td>';
    $cost = '<td style="text-align: center">' . $row['Cost'] . '</td>';
    $total = '<td style="text-align: center">' . $row['Total'] . '</td>';

    $table_data .= '<tr>' . $full_name . $qty . $cost . $total . "</tr>\n";
    $grand_total += $row['Total'];
}

$table_data .= '<tr><td colspan="3" style="text-align: right">Grand Total</td><td style="text-align:center">' . $grand_total . "</td></tr>\n";

echo $table_data;
?>
