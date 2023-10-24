<?php
$temp_script = $_SERVER['PHP_SELF'];
$sub_folder = str_replace(DS . 'fundraising' . DS, "", $temp_script);

switch ($sub_folder) {
  case 'squares/index.php':
  case 'squares/main_squares.php':
  case 'squares/main_squares_new.php':
  case 'squares/requestSquare.php':
  case 'admin/payments.php':
  case 'admin/edit_squares.php':
  case 'admin/delete_row.php':
  case 'admin/final_names.php':
  case 'admin/receivePay.php':
  case 'admin/emails.php':
  case 'squares_v2/index.php':
    include(HTML . 'head_squares.php');
    break;
  case 'menus/index.php':
    include(HTML . 'head_menus.php');
    break;
  case 'admin/teams_final.php':
  case 'admin/draw_squares.php':
    include(HTML . 'head_teams_final.php');
    break;
  case 'admin/setup_squares.php':
    include(HTML . 'head_setup.php');
    break;
  case 'admin/setup_squares_new.php':
    include(HTML . 'head_tabs.php');
    break;  
}
?>
