<!DOCTYPE html>
<html>
<head>
	<title>Planningstool - insert</title>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	include 'navbar.php';
	require 'datalaag.php';
	$id = $_GET['id'];
	$result = GetPlanning($id,$conn);
	?>

	<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$query = $conn->prepare('UPDATE `Planning` SET NaamSpel = :NaamSpel, Starttijd = :Starttijd, Spelers = :Spelers, Uitlegger = :Uitlegger WHERE ID=:id');
		$query->execute([ ':id' => $id, ':NaamSpel' => $_POST['Spel'], ':Starttijd' => $_POST['Starttijd'], ':Spelers' => $_POST['Spelers'] , ':Uitlegger' => $_POST['Uitlegger']]);
		$message = "Succesvol aangepast!";
		echo "<script type='text/javascript'>alert('$message'); window.location='Planning.php';</script>";
	}
	 ?>

	<div class="formulierToevoegen">
		<form method="post" action="edit.php?id=<?php echo $result['ID']; ?>">
		 <fieldset>
		  <legend>Planning toevoegen:</legend>
			<i class="fas fa-dice"></i> Spel: <input type="text" name="Spel" placeholder="Naam van het spel" value="<?php echo $result['NaamSpel']; ?>"> <br>
			<i class="fas fa-clock"></i> Starttijd: <input type="time" name="Starttijd" value="<?php echo $result['Starttijd']; ?>"> <br>
			<i class="fas fa-users"></i> Spelers: <input type="text" name="Spelers" placeholder="Spelers" value="<?php echo $result['Spelers']; ?>"></input> <br>
			<i class="fas fa-user-graduate"></i> Uitlegger: <input type="text" name="Uitlegger" placeholder="Uitlegger" value="<?php echo $result['Uitlegger']; ?>"> <br>
			<input type="submit" value="Verzenden">
		 </fieldset>
		</form>
	</div>

</body>
</html>

<!--  -->