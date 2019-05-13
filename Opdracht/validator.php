<!-- Nicky Devilee | 99047338
Bol4 applicatieontwikkelaar
Blok 2
Week 22 - Forms -->

<?php 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		for ($i=0; $i<count($antwoorden); $i++) {
			if (empty($antwoorden[$i])) {
				$errors[$i] = "required";
				$antwoorden[$i] = "";
			}
			else {
				$ans = test_input($antwoorden[$i]);
				if (!preg_match("/^[a-zA-Z ]*$/",$ans)) {
					$errors[$i] = "Only letters and white space allowed"; 
					$antwoorden[$i] = "";
			    }
			    else {
			    	$errors[$i] = " ";
			    }
			}
		}
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

 ?>