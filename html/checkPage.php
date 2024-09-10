<?php
$page_flag = false;
$script_flag = false;

switch ($sub_folder) {
  case 'admin/draw_squares.php':
    $script_flag = true;
    break;
}

switch ($sub_folder) {
  case 'admin/draw_squares.php':
  case 'admin/teams_final.php':
  case 'admin/setup_squares.php':
    $page_flag = true;
    break;
}
?>
