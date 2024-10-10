<h1>game</h1>

<?php

	foreach($data_games as $game)
	{
		echo $game['name'], ' ', $game['price'], '$';
		echo '<br>';
	}
	
?>