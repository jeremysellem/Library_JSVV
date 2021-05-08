<?php

	$servername = "35.241.185.169";
	$user = "root";
	$password = "J&VLibrary";
	$dbname = "Library_JSVV";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
		$conn-> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo "Echec:".$e->getMessage();
	}

?> 
