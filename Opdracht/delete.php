<!DOCTYPE html>
<html>
<head>
	<title>Planningstool - Delete</title>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
	include 'navbar.php';
	require 'datalaag.php';
	$id = $_GET['id'];
	$result = GetPlanning($id,$conn);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	    if($_POST['confirm']=='Ja') {
	        $query = $conn->prepare("DELETE FROM Planning WHERE id = :id");
	        $query->execute([':id' => $id]);
	        $message = "Succesvol verwijderd!";
			echo "<script type='text/javascript'>alert('$message'); window.location='Planning.php';</script>";
	    }
	    elseif($_POST['confirm']=='Nee') {
	        header('Location: planning.php');
	    }
	}
	?>

<div class="PlanningsData">
	<p><i class="fas fa-dice"></i> Spel: <?php echo $result['NaamSpel']; ?></p>
	<p><i class="fas fa-clock"></i> Starttijd: <?php echo $result['Starttijd']; ?></p>
	<p><i class="fas fa-users"></i> Spelers: <?php echo $result['Spelers']; ?></p>
	<p><i class="fas fa-user-graduate"></i> Uitlegger: <?php echo $result['Uitlegger']; ?></p>
	<form method="post" action="delete.php?id=<?php echo $result['ID']; ?>">
		<p>Weet u zeker dat u deze planning wilt verwijderen?</p>
		<input name="confirm" value="Ja" type="submit"><input name="confirm" value="Nee" type="submit">
	</form>
</div>

</body>
</html>