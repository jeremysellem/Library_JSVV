<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Personal info</title>
		<meta charset="UTF-8">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			body {
				background-color: #F5F5F5;
				margin: 0;
				padding: 0;
			}
		</style>
	</head>
	<body>

		<!-- Archives Banner -->
		<img src="../images/coffe_blue.jpg" width="100%" height="70%">
		
		
		<!-- Update link -->
		<a href="update.php">
			<h2>Update</h2>
		</a>

		<!-- Disconnect button -->
		<button class='btn btn-danger btn-xs' type="submit" name="Logout" onclick="parent.parent.logout_dialog();">
			<span class="fa fa-times">Logout</span>
		</button>

	</body>
</html>
