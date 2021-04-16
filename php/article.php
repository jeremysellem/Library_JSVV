
<!DOCTYPE>
<html>
	<head>
		<title>Article</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="article.css">
	</head>

	<body>

		<!-- Header -->
		<?php include "../head/head.php" ?>

		<!-- Import classes -->
		<?php
			include "../connexion/classes.php";
			session_start();
		?>

		<!-- Checks if variable id is set in the url -->
		<?php 
			if (isset($_GET["id"])) {
				$id = $_GET["id"];
			}
			else {
				echo "Page introuvable";
				exit();
			}
		?>

		<?php

			include "../connexion_bdd.php";

			try {
				$sql = "SELECT * FROM Livres WHERE Livre_ID = ".$id;
				$result = $conn->query($sql);
				$result = $result->fetch();

				if ($result["Livre_ID"]) {

					$titre = $result["Titre"];
					$description = $result["Resume"];
					$prix = $result["Prix"];
					$image = $result["Lien_image"];
					$type = $result["Categorie"];
				}
				else {
					echo "Page introuvable";
					exit();
				}
			}
			catch (Exception $e) {
				echo "Page introuvable";
				exit();
			}

			$conn = null;

		?>

		<div class="title">
			<h2><?php echo $type; ?></h2>
		</div>

		<div class="container-bigbloc">
			<div class="container-bloc">

				<div class="product-bloc" id="product-image">
					<?php echo "<img class='image' src='".$image."'>"; ?>	
				</div>

				<div class="product-bloc" id="product-info">
					<h2><?php echo $name; ?></h2>
					<p id="description"> echo
						<?php
							echo $description ;
						?> 
					</p>
					<h4><?php echo $price; ?> EUR</h4>

					<form method="post">
						Quantité : 
						<input type="number" name="quantity" value="1" min="1">
						<input type="submit" name="addToCart" value="Ajouter au panier">
					</form>

				</div>
				
			</div>
		</div>

<!-- 		<?php
			// add to cart only if logged in
			if (isset($_POST["addToCart"])) {
				if (isset($_SESSION['person'])) {
					$_SESSION['person']->addToCart($_GET["id"], $_POST["quantity"]);
					//echo $_SESSION['person']->toString();
				}
				else {
					if (isset($_SESSION['visitor'])) {
						$_SESSION['visitor']->addToCart($_GET["id"], $_POST["quantity"]);
						//echo $_SESSION['visitor']->toString();
					}
					else {
						$_SESSION['visitor'] = new User("", "", "", "");
						$_SESSION['visitor']->addToCart($_GET["id"], $_POST["quantity"]);
						//echo $_SESSION['visitor']->toString();
					}
				}
			}
		?>
 -->

		<!-- Footer -->
		<?php include "../footer/footer.php" ?>

	</body>
</html>