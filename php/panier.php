<!DOCTYPE>
<html>
	<head>
		<title>Panier</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<style type="text/css">
			#title-cart {
				margin-top: 80px;
			}
		</style>
	</head>

	<body>

		<?php
			include "registered.php";
			session_start();
		?>
		
		<div id='prod_banner'></div>

		<div class="title" id="title-cart">
			<h2>Panier</h2>
		</div>
		<div class="container-bigbloc">
		

	<?php

		if (isset($_SESSION["admin"])) {
			$cart = $_SESSION["admin"]->getCart();
		}
		elseif (isset($_SESSION["regular"])) {
			$cart = $_SESSION["regular"]->getCart();
		}

		if (empty($cart) || !isset($cart)) {
			echo "<h2><center>Le panier est vide...</center></h2>";
		}
		else {
			echo "HEllO";
			include "connexion_bdd.php";

			try {	
				echo '<div class="container-bloc">';

				foreach ($cart as $product) {				
					$sql = "SELECT * FROM Library_JSVV.Livres WHERE Livre_ID = ".$product;
					$result = $conn->query($sql);
					$result = $result->fetch();

					if ($result["Livre_ID"]) {
						echo '<div class="product-bloc">
							<div class="product-image">
								<a href="article.php?id='.$result["Livre_ID"].'">
									<img class="image" src="'.$result["Lien_image"].'">
								</a>
							</div>
							<div class="product-info">
								<a class="link" href="article.php?id='.$result["Livre_ID"].'">
									<h4>'.$result["Titre"].'</h4>
								</a>
								<h6>'.$result["Prix"].' EUR</h6>
							</div>
						</div>';
					}
				}

				echo "</div>";
			}
			catch (Exception $e) {
				echo '$e';
			}

			$conn = null;
		}

	?>

</div>
</body>
</html>
