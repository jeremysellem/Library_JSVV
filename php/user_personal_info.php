<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Personal info</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			body {
				background-color: #F5F5F5;
				margin: 0;
				padding: 0;
			}
			.container {
				justify-content: center;
			}
		</style>
	</head>
	<body>

		<!-- Archives Banner -->
		<img src="../images/coffe_blue.jpg" width="100%" height="70%">
	
		<div class="container">
			<!-- Update link -->
			<a href="update.php" target="Main">
				<button class="btn btn-primary">Update</button>
			</a> <!-- TODO centrer les boutons en hauteur et en largeur ! -->

			<!-- Disconnect button -->
			<button class='btn btn-danger btn-xs' type="submit" name="Logout" onclick="parent.parent.logout_dialog();">
				<span class="fa fa-times">Logout</span>
			</button>
		</div>
	</body>
</html>
