<?php
	session_start();

	// If we just filled the log in form
	if(isset($_SESSION["LOGGING_IN"]) && $_SESSION["LOGGING_IN"] == true) {

		try {

			// Initiate connection to DB
			include "connexion_bdd.php";

			// Prepare statement to verify credentials
			$sql = "SELECT CUS_ID, CUS_FIRST_NAME, CUS_TYPE FROM USERS WHERE CUS_EMAIL=\"" . $_SESSION['email_address'] . "\" AND CUS_PW=\"" . $_SESSION['password'] . "\";";
			
			// Execute query
			$result = $conn->query($sql);

			// Get results
			$user = $result->fetch();

			// Successful credentials ?
			if($user["CUS_ID"] > 0) {
				// Yes then store the CUS_ID in the session
				$_SESSION["CUSTOMER_ID"] = $user["CUS_ID"];
				$_SESSION["CUSTOMER_FIRST_NAME"] = $user["CUS_FIRST_NAME"];
				if($user["CUS_TYPE"] == "ADMIN") {
					$_SESSION["IS_ADMIN"] = true;
				}
				else {
					$_SESSION["IS_ADMIN"] = false;
				}
				
				echo "You are now connected. Please move on to the catalog to make your purchase.";

			}
			else {
				// No then try again
				echo "Wrong email/password combination, please try again.";
			}

		}
		catch (Exception $e) {
			echo $e;
		}

		$conn = null;
	}

	$_SESSION["LOGGING_IN"] = false;

	// If we just clicked on Logout
	if(isset($_GET["LOGGING_OUT"]) && $_GET["LOGGING_OUT"] == true) {
		$_SESSION = [];
		session_destroy();
	}

?>