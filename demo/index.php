No<!DOCTYPE html>
<?php include('elo.php'); ?>
<html>
<head>
	<title>Elo Rating</title>
</head>
<body>

	<?php


		$Elo = new elo(1000,1000);
		$Elo->chance();
		$result = $Elo->rating(1,0);
		echo "<h2>Old ratings</h2>";
		echo "A = ";
		echo $Elo->ratingA;
		echo "<br>";
		echo "B = ";
		echo $Elo->ratingB;
		echo "<br><br>";
		echo "<h2>New ratings - <small>Winner is player A</small></h2>";
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		/*
		!!NORMALY PLAYERS START WITH A RATING OF 1400!!
		-----------------------------------------
			Inc/Dec Rating
		-----------------------------------------
		New rating = Or + K(Wl - Ex)

		Or = Old Rating
		K = K-factor
			players below 2100, K = 32
			Players between 2100 and 2400, K = 24
			Players over 2400, K = 16

		Wl = Win or lose, 1 = win, 0 = lose
		Ex = Forventet % tab eller vind
		
		-----------------------------------------
			% chance for at vinde(0-1)
		-----------------------------------------
		Forventet for player 1:
			ChanceA = 1/(1+10^((Ra - Rb) / 400))
			ChanceB = 1/(1+10^((Rb - Ra) / 400))

			Ra = Rating for player A
			Rb = Rating for player B

		*/

	?>

</body>
</html>