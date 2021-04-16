<?php

	$servername = "localhost";
	$user = "root";
	$password = "root";
	$dbname = "Library_JSVV";


	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
		$conn-> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


	}
	catch (PDOException $e) {
		echo "Echec:".$e->getMessage();
	}

?>