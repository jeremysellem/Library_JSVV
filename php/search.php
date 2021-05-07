<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Search</title>
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/search.css" />
	</head>
	<body>

		<div id='prod_banner'>
		</div>

		<?php include "connexion_bdd.php"; ?>

		<?php 
		// include "registered.php";
		 ?>

		<div class="title">
			<h1>Recherche</h1>
		</div>

		<?php 
			// 	if($_POST['user_type'] == "admin") {
			// 	echo "<h3> Bonjour ".$_POST['first_name']. ", vous pouvez sélectionner les articles que vous souhaitez réserver. </h3>";
			// 	$u = new Administrator($_POST['first_name'], $_POST['last_name'], $_POST['email_address']);
			// 	$u->Display();
			// }
			// else {
			// 	echo "<h1>Recapitulatif de vos informations</h1>";
			// 	$u = new Regular($_POST['first_name'], $_POST['last_name'], $_POST['email_address'], $_POST['age'], $_POST['postal_address']);
			// 	$u->Display();
			// 	echo "<h3> Bonjour ".$_POST['first_name']. ", vous pouvez sélectionner les articles que vous souhaitez réserver. </h3>";
			// 	$file = 'users.txt'; // Nom du fichier contenant les informations
			// 	$current = file_get_contents($file); // Ouvre un fichier pour lire un contenu existant
			// 	$current .=  $u->Export() . "\n"; // Ajoute l'utilisateur nouvellement créé
			// 	file_put_contents($file, $current); // Écrit le résultat dans le fichier
			// 	}
		?>


	
		<div class="container-bigbloc">
			<div class="search-bar">
				

				<form method="post">
					<input class="research" type="text" name="reseach" placeholder="Rechercher un produit" required>
					<input class="research-button" type="submit" name="send" value="Rechercher">
				</form>
			</div>



				<div id="prod_wrap"> 
					<div id="prod_columns" class="prod_col"> 


		<?php

				if (isset($_POST["send"]) && !empty($_POST["reseach"])) {
					$research = htmlspecialchars($_POST["reseach"]);

					$sql = "SELECT * FROM Library_JSVV.Livres where 
					(Titre like '%".$research."%') OR 
					(Auteur like '%".$research."%') OR
					(Categorie like '%".$research."%')" ;
					$result = $conn->query($sql);

					if($result->rowCount() > 0) {
						echo '<h3>Résulat de la recherche : "'.$research.'"</h3>';
						echo '<div class="container-bloc" id="results">';
						foreach ($result as $row) {
							echo '<figure>
										<img src='.$row["Lien_image"].'>
										<figcaption >'.$row["Titre"].'</figcaption>
										<figcaption >'.$row["Auteur"].'</figcaption>
										<span class="price">'.$row["Prix"].' EUR</span>
										<a class="prod_button" href="article.php?id='.$row["Livre_ID"].' "> Description</a>
										</figure>';
						}
						echo "</div>";
					}
					else {
						echo '<h3>Résulat de la recherche : "'.$research.'"</h3>';
						echo "<div id='noresult'>0 résultat...</div>";
					}
				}
			?>
		</div>
	</div>
</div>
</body>
</html>




