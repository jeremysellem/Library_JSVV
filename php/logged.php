<?php
	session_start();

	$_SESSION["LOGGING_IN"] = true;
	$_SESSION["email_address"] = $_POST["email_address"];
	$_SESSION["password"] = $_POST["password"];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Logged in</title>
		<meta http-equiv="refresh" content="0; URL=home.php" />
	</head>
	<body>
	</body>
</html>
