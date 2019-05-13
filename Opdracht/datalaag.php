<!-- Nicky Devilee | 99047338
Bol4 applicatieontwikkelaar -->

<?php


$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "Gameplanning";

// connectie maken

try {
    $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


// functie's om query uit te voeren

function GetGames($conn){
	$query = $conn->prepare('SELECT * FROM games');
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function GetGame($id,$conn){
	$query = $conn->prepare('SELECT * FROM games WHERE id=:id');
	$query->execute([':id' => $id]);
	$result = $query->fetch();
	return $result;
}

function GetAllPlanning($conn){
	$query = $conn->prepare('SELECT * FROM Planning ORDER BY Starttijd ASC');
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function GetPlanning($id,$conn){
	$query = $conn->prepare('SELECT * FROM Planning WHERE ID=:id');
	$query->execute([':id' => $id]);
	$result = $query->fetch();
	return $result;
}
?>