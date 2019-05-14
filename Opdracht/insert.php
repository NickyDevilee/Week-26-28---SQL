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
	$antwoorden = array('Starttijd', 'Spelers', 'Uitlegger');
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid = true;
            foreach($antwoorden as $ant ) {
                $data[$ant] = "";
                $dataErr[$ant] = ""; 
                if (empty($_POST[$ant])) {

                    $valid=false;
                    $dataErr[$ant] = "required";
                }
                else {
                    $data[$ant]= test_input($_POST[$ant]);
                }

            }
            if($valid){
            	InsertPlanning($conn, $_POST['Spel'], $_POST['Starttijd'], $_POST['Spelers'], $_POST['Uitlegger']);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
	 ?>

	<div class="formulierToevoegen">
		<form method="post" action="insert.php">
		 <fieldset>
		  <legend>Planning toevoegen:</legend>
			<i class="fas fa-dice"></i> Spel: <select name="Spel">
				<?php 
				$result = GetGames($conn);
				foreach ($result as $rij) {echo "<option value='".$rij['id']."'> ".$rij['name']." </option>";}
				?>
			</select> <br>
			<i class="fas fa-clock"></i> Starttijd: <input type="time" name="Starttijd" value='<?php echo $_POST['Starttijd'];?>'> <?php echo $dataErr['Starttijd']; ?> <br>
			<i class="fas fa-users"></i> Spelers: <input type="text" name="Spelers" placeholder="Spelers" value='<?php echo $_POST['Spelers'];?>'><?php echo $dataErr['Spelers']; ?> <br>
			<i class="fas fa-user-graduate"></i> Uitlegger: <input type="text" name="Uitlegger" placeholder="Uitlegger" value='<?php echo $_POST['Uitlegger'];?>'><?php echo $dataErr['Uitlegger']; ?> <br>
			<input type="submit" value="Verzenden">
			<input type="reset">
		 </fieldset>
		</form>
	</div>

</body>
</html>

<!--  

-->