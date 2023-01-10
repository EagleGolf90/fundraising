		<ul class="instruction">
<?php
$messages = $squares->getInstructions();
$useDiamondTouch = 'N';
$useDiamondTouchImage = 'N';
$specialInstruction = 'N';

foreach ($messages as $message) {
	$useDiamondTouch = $message['UseDiamondTouch'];
	$subLine = false;

	if ($message["QuarterInning"] > 4) {
		if ($specialInstruction == 'N') {
		  echo '<li>&nbsp;</li>' . "\n";
			$specialInstruction = 'Y';
	  }
  }
  echo '<li>' . "\n";
	echo str_replace(':a1', $message['SquareCost'], $message['Message']);

	if ($message['UseDiamondTouch'] == 'Y') {
		$useDiamondTouchImage = 'Y';
		$subLine = true;
		echo '<ul class="subInstruction">' . "\n";
		echo '<li>' . str_replace(':b1', $message['DiamondTouchCost'], $message['DiamondTouchComment']) . '</li>';
	}

	if ($message['UseReverseWinner'] == 'Y') {
		if (!$subLine) echo '<ul class="subInstruction">' . "\n";
		$subLine = true;
    echo '<li>' . str_replace(':c1', $message['ReverseWinnerCost'], $message['ReverseWinnerComment']) . '</li>';
	}

	if ($subLine) echo '</ul>' . "\n";
  echo '</li>' . "\n";
}
if ($useDiamondTouchImage == 'Y') {
?>
      <br/>
		  <li><strong>Example:</strong> Diamond Touch<br/><img src="<?php echo SQUARES_URL; ?>images/diamond_touch.png"></li>
<?php
}
?>
		</ul>
		<br/>
