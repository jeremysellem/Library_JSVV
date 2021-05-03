<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Account</title>
		<meta charset="UTF-8">
		<style type="text/css">
			body {
				background-color: #F5F5F5;
				margin: 0;
				padding: 0;
			}
		</style>
	</head>
	<body>
		<div>

			<!-- Test whether you are connected -->
			<?php if(isset($_SESSION["CUSTOMER_ID"]) && $_SESSION["CUSTOMER_ID"] > 0) : ?>
				
				<!-- OK you have access to your personal data -->
				<iframe id="User_personal_info" name="User_personal_info" src="user_personal_info.php" style="width: 100%;" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" frameBorder="0" scrolling="no" ></iframe>


			<!-- KO you are not connected -->
			<?php  else: ?>

				<!-- Log in or create an account (forms)-->
				<iframe id="Log_in" name="Log_in" src="log_in.php" style="width: 100%;" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" frameBorder="0" scrolling="no" ></iframe>

			<?php endif?>

		</div>
	</body>
</html>