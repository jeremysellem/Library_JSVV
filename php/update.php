<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Update</title>
		<style type="text/css">
		    body {
                margin: 0;
                padding: 0;
            }
           </style>
	</head>
	<body>
		<div>

			<!-- Test whether you are connected -->
			<?php if(isset($_SESSION["CUSTOMER_ID"]) && $_SESSION["CUSTOMER_ID"] > 0) : ?>

				<!-- Test whether you are an administrator -->
				<?php if(isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == true) : ?>

					<!-- OK you have access to the user management table -->
					<iframe id="User_data_table" name="User_data_table" src="user_management_table.php" style="width: 100%;" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" frameBorder="0" scrolling="no" ></iframe>
				
				<!-- KO you are not an admin, you have no access to this section -->
				<?php  else: ?>

					<!-- Restricted area Banner -->
					<img src="../images/restricted_area.jpg" width="100%" height="100%">
					<h1>Access to this section is only allowed to administrators & moderators.</h1>
				
				<?php endif?>

			<!-- KO you are not connected -->
			<?php  else: ?>

				<!-- Log in or create an account (forms)-->
				<iframe id="Log_in" name="Log_in" src="log_in.php" style="width: 100%;" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" frameBorder="0" scrolling="no" ></iframe>

			<?php endif?>

		</div>
	</body>
</html>

