<?php 
include 'navbar.php';
include 'head.php';
require 'datalaag.php';
$id = $_GET['id'];
$result = GetGame($id,$conn);
?>

<title><?php echo $result['name']; ?></title>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="GameData">
	<h1 class="Titel"><?php echo $result['name']; ?></h1>
	<img class="Foto" src="img/<?php echo $result['image']; ?>">
	<p class="Beschrijving"><?php echo $result['description']; ?></p>
	<p class="Skills">Skills: <?php echo $result['skills']; ?></p>
	<p class="Expansions">Expansions: <?php echo $result['expansions']; ?></p>
	<p class="Min-spelers">Minimale spelers: <?php echo $result['min_players']; ?>.</p>
	<p class="Max-spelers">Maximale spelers: <?php echo $result['max_players']; ?>.</p>
	<p class="Speeltijd">Speeltijd: <?php echo $result['play_minutes']; ?> minuten.</p>
	<p class="Uitlegtijd">Uitlegtijd: <?php echo $result['explain_minutes']; ?> minuten.</p>
	<a class="Url" href="<?php echo $result['url']; ?>"><?php echo $result['url']; ?></a>
	<p class="Youtube"><?php echo $result['youtube']; ?></p>
</div>

<!-- 
GameInfo
Titel
Foto
Beschrijving
Expansions
Min-spelers
Max-spelers
Speeltijd
Uitlegtijd
 -->