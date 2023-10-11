<?php
switch (1) {
  case 1: // NFL
  case 4: // NBA
    $labels = array('First Quarter', 'Second Quarter', 'Third Quarter', 'Final Score', 'Reverse Winner');
    break;
              
  case 2: // NCAA
    $labels = array('First Half', 'Second Half', 'Final Score', '', '');
    break;
  
  case 3: // MLB
    $labels = array('First Inning', 'Third Inning', 'Sixth Inning', 'Final Score', '');
    break;
}
?>
