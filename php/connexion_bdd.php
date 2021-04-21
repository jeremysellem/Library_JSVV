<?php


	$servername = "35.241.185.169";
	$user = "root";
	$password = "J&VLibrary";
	$dbname = "Library_JSVV";

	// phpMyAdmin en local
	// $servername = "localhost";
	// $user = "root";
	// $password = "root";
	// $dbname = "Library_JSVV";

	// Amazon - not working, cannot connect
	// $servername = 'jsvv-library.cy0nqs4hfugv.us-east-2.rds.amazonaws.com';
	// $user = 'admin';
	// $password = 'JSVV12345';
	// $dbname = "jsvv-library";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
		$conn-> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		

	}
	catch (PDOException $e) {
		echo "Echec:".$e->getMessage();
	}

?> 
