<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Panier</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/products.css">
		<link rel="stylesheet" type="text/css" href="../css/search.css">
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

				foreach ($cart as $id => $quantity) {			
					$sql = "SELECT * FROM Library_JSVV.Livres WHERE Livre_ID = ".$id. " AND Stock >=" .$quantity;
		
					$result = $conn->query($sql);
					$result = $result->fetch();

					if ($result["Livre_ID"]) {
	
						echo '<figure>
							<img src='.$result["Lien_image"].'>
							<figcaption >'.$result["Titre"].'</figcaption>
							<figcaption >'.$result["Auteur"].'</figcaption>
							<span class="price">'.$result["Prix"].' EUR</span>
							<a class="prod_button" href="article.php?id='.$result["Livre_ID"].'"> Description</a>
							<h4>x'.$quantity.'</h4>
							'.$_SERVER["REQUEST_URI"].'
							<form method="post" action="update_quantity?id='.$result["Livre_ID"].'&url='.$_SERVER["REQUEST_URI"].'">
								Modifier la quantité : 
								<input class="modify-input" type="number" name="quantity" value="'.$quantity.'" min="0">
								<input class="modify-button" type="submit" name="modify" value="Modifier">
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

	<div class="title" id="title-cart">
		<h2>Search any product to add to your cart:</h2>
	</div>
	
	<div class="container-bigbloc">
		<div class="search-bar">
			

			<form method="post">
				<input class="research" type="text" name="reseach" placeholder="Search for any book or product" required>
				<input class="research-button" type="submit" name="send" value="Search">
			</form>
		</div>
			<div id="prod_wrap"> 
				<div id="prod_columns" class="prod_col"> 

		<?php
			include "connexion_bdd.php";
			include "search_results.php";
		?>
		</div>
	

	<!-- remove artcile from cart NE FONCTIONE PAS ENCORE -->
	<?php	
		// if (isset($_POST["remove"])) {
		// 	for ($i = 0; $i < count($_SESSION["cart"]); $i++)  {
		// 		if ($_SESSION["cart"][$i] == $id){
		// 			unset($_SESSION["cart"][$i]);
		// 		}
				
		// 	}
		// }
		?>

	
</div>
</body>
</html>
