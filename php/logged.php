<?php
	session_start();

	if(isset($_POST['email_address'])) {
		$_SESSION["email_address"] = $_POST["email_address"];
		$_SESSION["password"] = $_POST["password"];	
	}
	
	$_SESSION["LOGGING_IN"] = true;

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
