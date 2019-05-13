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

	<div class="ContainerPlanningInfo">
		<?php 
		$result = GetAllPlanning($conn);
		foreach ($result as $rij) {
		?>
		<div class="PlanningsItem">	
			<h4 class="PlanningsItemTitel"><i class="fas fa-gamepad"></i> - <?php echo $rij['NaamSpel']; ?></h4>
			<h4 class="PlanningsItemTitel"><i class="fas fa-clock"></i> - <?php echo $rij['Starttijd']; ?></h4>
			<h4 class="PlanningsItemTitel"><i class="fas fa-user-friends"></i> - <?php echo $rij['Spelers']; ?></h4>
			<h4 class="PlanningsItemTitel"><i class="fas fa-user-graduate"></i> - <?php echo $rij['Uitlegger']; ?></h4>
			<a href="edit.php?id=<?php echo $rij['ID']; ?>"><i class="fas fa-user-cog"></i> Aanpassen</a> <br>
			<a href="delete.php?id=<?php echo $rij['ID']; ?>"><i class="fas fa-eraser"></i> Verwijderen</a>
		</div>
		<?php 
		}
		?>
	</div>

</body>
</html>