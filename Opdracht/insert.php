<!DOCTYPE html>
<html>
<head>
	<title>Planningstool - insert</title>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php require 'datalaag.php'; ?>

	<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$query = $conn->prepare('INSERT INTO `Planning` (ID, NaamSpel, Starttijd, Spelers, Uitlegger) VALUES (null, :NaamSpel, :Starttijd, :Spelers, :Uitlegger)');
		$query->execute([':NaamSpel' => $_POST['Spel'], ':Starttijd' => $_POST['Starttijd'], ':Spelers' => $_POST['Spelers'] , ':Uitlegger' => $_POST['Uitlegger']]);
		$message = "Succesvol toegevoegd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='Planning.php';</script>";
	}
	 ?>

	<div class="formulierToevoegen">
		<form method="post" action="insert.php">
		 <fieldset>
		  <legend>Planning toevoegen:</legend>
			<i class="fas fa-dice"></i> Spel: <select name="Spel">
				<?php 
				$result = GetGames($conn);
				foreach ($result as $rij) {echo "<option value='".$rij['name']."'> ".$rij['name']." </option>";}
				?>
			</select> <br>
			<i class="fas fa-clock"></i> Starttijd: <input type="time" name="Starttijd" required> <br>
			<i class="fas fa-users"></i> Spelers: <input type="text" name="Spelers" placeholder="Spelers" required> <br>
			<i class="fas fa-user-graduate"></i> Uitlegger: <input type="text" name="Uitlegger" placeholder="Uitlegger" required> <br>
			<input type="submit" value="Verzenden">
			<input type="reset">
		 </fieldset>
		</form>
	</div>

</body>
</html>

<!--  -->