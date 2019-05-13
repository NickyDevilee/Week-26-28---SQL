<!-- Nicky Devilee | 99047338
Bol4 applicatieontwikkelaar -->

<!DOCTYPE html>
<html>
<head>
	<title>Planningstool - Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'head.php'; ?>
</head>
<body>

	<?php include 'navbar.php'; ?>

	<?php require 'datalaag.php'; ?>

	<div class="ContainerGameInfo">
		<?php 
		$result = GetGames($conn);
		foreach ($result as $rij) {
		?>
		<div class="GameInfo">	
			<a class="GameKlik" href="Game-data.php?id=<?php echo $rij['id']; ?>">
				<h4 class="Titel"><?php echo $rij['name']; ?></h4>
				<img class="Foto" src="img/<?php echo $rij['image']; ?>">
			</a>
		</div>
		<?php 
		}
		?>
	</div>

</body>
</html>