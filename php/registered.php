<?php
	session_start();
	
	include "connexion_bdd.php";

	try {
		// Common part of the statement
		$sql = "INSERT INTO USERS (CUS_FIRST_NAME,CUS_LAST_NAME,CUS_DOB,CUS_ADDR,CUS_EMAIL,CUS_TEL_PREFIX,CUS_TEL,CUS_PW,CUS_JOINDATE,CUS_LASTACCESS,CUS_TYPE)";

		// This part depends on the user type
		if($_POST['user_type'] == "REGULAR") {
			$sql .= " VALUES (\"".$_POST['first_name']."\",\"".$_POST['last_name']."\",\"".$_POST['birthday']."\",\"".$_POST['postal_address']."\",\"".$_POST['email1']."\",33,NULL,\"".$_POST['password1']."\",curdate(),curdate(),\"REGULAR\");";
		}
		else {
			$sql .= " VALUES (\"".$_POST['first_name']."\",\"".$_POST['last_name']."\",NULL,NULL,\"".$_POST['email1']."\",33,NULL,\"".$_POST['password1']."\",curdate(),curdate(),\"ADMIN\");";
		}
		
		// Execute query
		$result = $conn->query($sql);

		$_SESSION['email_address'] = $_POST["email1"];
		$_SESSION['password'] = $_POST["password1"];
	}
	catch (Exception $e) {
		echo $e;
	}

	$conn = null;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registered</title>
		<meta http-equiv="refresh" content="0; URL=logged.php" />
	</head>
	<body>
	</body>
</html>

		


