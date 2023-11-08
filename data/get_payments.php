<?php
include('../preload.php');

$return_arr = array();

$sqlTable = new SQLTable();
$parm = array($_POST['yearPicked'], $_POST['eventType'], $_POST['poolNumber']);
$rows = $sqlTable->load('getSquarePayments', $parm);

foreach ($rows as $row) {
    $fullName = empty($row['NickName']) ? $row['FirstName'] . ' ' . $row['LastName'] : $row['NickName'];
    $qty = $row['Qty'];
    $cost = $row['Cost'];
    $total = $row['Total'];

    $return_arr[] = array("fullName" => $fullName,
                    "qty" => $qty,
                    "cost" => $cost,
                    "total" => $total);
}

echo json_encode($return_arr);
?>
