<?php session_start();
	include 'connexion.php';
?>

<!DOCTYPE html>
<html lang="en">
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


		
		<div id='prod_banner'></div>

		<div class="title" id="title-cart">
			<h2>Your cart:</h2>
		</div>

		<!-- <div class="container-bigbloc"> -->
		

	<?php
		include "connexion_bdd.php";

		if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
			echo "<h2><center>Empty cart...</center></h2>";
		}
		else {
			
			try {	
				echo '<div id="prod_wrap"> 
				<div id="prod_columns" class="prod_col">' ;
				
				$cart = $_SESSION["cart"];

				foreach ($cart as $product) {			
					$sql = "SELECT * FROM Library_JSVV.Livres WHERE Livre_ID = ".$product;
		
					$result = $conn->query($sql);
					$result = $result->fetch();

					if ($result["Livre_ID"]) {
						// echo '<div class="product-bloc">
						// 	<div class="product-info">
						// 		<a class="link" href="article.php?id='.$result["Livre_ID"].'">
						// 			<h4>'.$result["Titre"].'</h4>
						// 		</a>
						// 	</div>
						// </div>';
						echo '<figure>
							<img src='.$result["Lien_image"].'>
							<figcaption >'.$result["Titre"].'</figcaption>
							<figcaption >'.$result["Auteur"].'</figcaption>
							<span class="price">'.$result["Prix"].' EUR</span>
							<a class="prod_button" href="article.php?id='.$result["Livre_ID"].'"> Description</a>
							<form method="post"> 
								<input type="submit" name="remove" value="Remove from cart">
							</form>
							</figure>';
		
					}
				}

				echo "</div>";
				echo "</div>";



			}
			catch (Exception $e) {
				echo "Erreur";
				echo '$e';
			}

			$conn = null;
		}

	?>
	<!-- remove artcile from cart NE FONCTIONE PAS ENCORE -->
	<?php	
		if (isset($_POST["remove"])) {
			for ($i = 0; $i < count($_SESSION["cart"]); $i++)  {
				if ($_SESSION["cart"][$i] == $id){
					unset($_SESSION["cart"][$i]);
				}
				
			}
		}
		?>
	
</div>
</body>
</html>
