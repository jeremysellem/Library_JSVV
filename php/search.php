<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="../css/search.css">
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
			include "search_results.php";
			?>
		</div>
	</div>
</div>
</body>
</html>




