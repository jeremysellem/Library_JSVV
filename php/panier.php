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
			<h2>Panier</h2>
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
						echo '<div class="product-bloc">
							<div class="product-info">
								<a class="link" href="article.php?id='.$result["Livre_ID"].'">
									<h4>'.$result["Titre"].'</h4>
								</a>
							</div>
						</div>';
		
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
	<?php	
			// include "search.php";
		?>
	
</div>
</body>
</html>
