<?php
	session_start();

	if(isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == true) {
		echo "OK vous êtes un admin";
	}
	else {
		echo "KO pas amdmin";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Update</title>
	</head>
	<body>
		<div>
			Une page Update où un des administrateurs peut :</br>

			Ajouter des produits ou des livres.</br>

			Modifier des produits ou des livres.</br>

			Lors de la modification ou l’ajout ni le prix ni la quantité ne peuvent être négatives</br>

			Supprimer des produits ou des livres.</br>

			Afficher les produits et livres disponibles et la quantité disponible en stock ainsi que le prix</br>

			Salut <?php if($_SESSION["CUSTOMER_FIRST_NAME"] != null) echo $_SESSION["CUSTOMER_FIRST_NAME"]; else echo "NULL"; ?> !<br />
		</div>
	</body>
</html>
