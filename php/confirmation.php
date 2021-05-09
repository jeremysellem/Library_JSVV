<?php session_start();
include "connexion_bdd.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Confirmation</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/products.css"/>
		<style type="text/css">
			#title-cart {
				margin-top: 80px;
			}
		</style>
	</head>
	

	<body>


		<div id='prod_banner'></div>
        
        <div class="title" id="title-cart">
			<h2>Recap of your order:</h2>
        </div>

		<?php
			
			if(isset($_POST["confirm"]) ){
				$cart = $_SESSION["cart"];
				$total = 0;
				echo '<div id="prod_wrap"> 
					<div id="prod_columns" class="prod_col">' ;
					foreach ($cart as $id => $quantity) {			
						$sql = "SELECT * FROM Library_JSVV.Livres WHERE Livre_ID = ".$id;
			
						$result = $conn->query($sql);
						$result = $result->fetch();

						if ($result["Livre_ID"] ) {
							$titre = $result['Titre'];
							$auteur = $result['Auteur'];
							$prix = $result['Prix'];
							$espace = '\n';
							$output = <<< HERE
								Product: $titre by $auteur
								Prix:$prix
								Quantité: $quantity
								\n
								HERE;
							file_put_contents('orders.txt', $output,FILE_APPEND);
							$total += $prix*$quantity;
							echo '<figure>
								<img src='.$result["Lien_image"].'>
								<figcaption >'.$result["Titre"].'</figcaption>
								<figcaption >'.$result["Auteur"].'</figcaption>
								<span class="price">'.$result["Prix"].' EUR</span>
								<h4>Quantity: '.$quantity.'</h4>
								</figure>';
						}

					
					}
				echo '</div>';
				echo '</div>';

			} 

			if(isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == true) {
				$total = $total * 0.85;
				echo '<div class="recap" id="recap-price">
				<a>Reduction: 15% <br> Total to pay: '.$total.' euro</a>
				</div>';
				echo '<br>';


			} elseif(isset($_SESSION["IS_ADMIN"]) && $_SESSION["IS_ADMIN"] == false) {
				$total = $total * 0.90;
				echo '<div class="recap" id="recap-price">
				<a>Reduction: 10% <br> Total to pay: '.$total.' euro</a>
				</div>';
				echo '<br>';
			} elseif(!isset($_SESSION["IS_ADMIN"])) {
				echo '<div class="recap" id="recap-price">
				<a>Total to pay: '.$total.' euro</a>
				</div>';
				echo '<br>';
			}
			if (!empty($_SESSION["cart"])){
				echo '<div class="title" id="title-cart">
				<a>You can withdraw your orders at our shop at 02 Avenue Achille Peretti, 92200 Neuilly-sur-Seine. We are open from Monday to Saturday, from 10am to 5pm.<a>
			</div>';
			echo '<br>';
			}
         ?> 


		 
		 <div class="container">
			<a href="panier.php" target="Main">
				<button class="btn btn-primary">Back to basket</button>
			</a> 
		</div>
        



            

    </body>
</html>