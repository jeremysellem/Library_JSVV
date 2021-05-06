<?php
	session_start();
?>

<!DOCTYPE>
<html>
	<head>
		<title>Article</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/article.css" />
	</head>

	<style type="">
	
	</style>

	<body>

		<div id='prod_banner'>
		</div>

			<div id="prod_wrap"> 
			<div id="prod_columns" class="prod_col"> 

		<?php 
			if (isset($_GET["id"])) {
				$id = $_GET["id"];
			}
			else {
				echo "Page introuvable";
				exit();
			}
		?>

		<?php include "connexion_bdd.php"; ?>

		<?php 
			include "registered.php";
			session_start(); 
		?>

		<?php 
			try {
				$sql = "SELECT * FROM Library_JSVV.Livres WHERE Livre_ID = ".$id;
				$result = $conn->query($sql);
				$result = $result->fetch();

				if ($result["Livre_ID"]) {

					$titre = $result["Titre"];
					$auteur = $result["Auteur"];
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
				echo "Page introuvable" .$e. " ";
				exit(); 
			}

			$conn = null;

		?>

		<div class="container-bigbloc">
			<div class="container-bloc">

				<div class="product-bloc" id="product-image">
					<?php echo "<img class='image' src='".$image."'>"; ?>	
				</div>

				<div class="product-bloc" id="product-info">
					<h1><?php echo $titre; ?></h1>
					<h2><?php echo $auteur; ?></h2>
					<p id="description"> 
						<?php
							echo $description 
						?> 
					</p>
					<h3><?php echo $prix ?> EUR</h3>

					<form method="post">
						Quantité : 
						<input type="number" name="quantity" value="1" min="1">
						<input type="submit" name="addToCart" value="Ajouter au panier">
					</form>

				</div>
				
			</div>
		</div>


		<?php
			// add to cart only if logged in
			if (isset($_POST["AjoutPanier"])) {
				if (isset($_SESSION['admin'])) {
					$_SESSION['admin']->AjoutPanier($_GET["id"]);
					
				}
				else {
					if (isset($_SESSION['regular'])) {
						$_SESSION['regular']->AjoutPanier($_GET["id"]);
						
					}
					else {
						$_SESSION['regular'] = new User("", "", "");
						$_SESSION['regular']->AjoutPanier($_GET["id"]);
						
					}
				}
			}
		?>


	</body>
</html>