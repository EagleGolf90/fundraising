		<ul>
			<li>$<?php echo $squares->getCost(); ?> per square. No Limit.</li>
			<li>The numbers of dark magenta will be in drawing after all squares filled up.</li>
<?php if ($squares->getEventType() == 6) { ?>
			<li>The top row (background blue) is first place and/or tied to first on each round.</li>
			<li>The left column (background red) is second place and/or tied to second on each round.</li>
			<li>
				<strong>For Example</strong><br/>
			  <u>First Round:</u> Rory McIlroy leads with a score of -5 and Matt Homa is second place with a score of -3, the top row is 5 and left column is 3.<br/>
			  <u>Second Round:</u> Matt Homa leads with a score of -8 and Tommy Fleetwood is tied for second place with a score of -7, the top row is 8 and left column is 7.
			</li>
<?php } ?>
			<li>Total Prizes Giveaway is $<?php echo $squares->getGiveAmount(); ?>.</li>
			<li><?php echo '$' . $squares->getKeepAmount() . ' ' . $squares->getFundDesc(); ?></li>
		</ul>
		<br/>
