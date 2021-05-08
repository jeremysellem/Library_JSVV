<?php
	session_start();

	if(isset($_POST['email_address'])) {
		$_SESSION["email_address"] = $_POST["email_address"];
		$_SESSION["password"] = $_POST["password"];	
	}
	
	$_SESSION["LOGGING_IN"] = true;

?>