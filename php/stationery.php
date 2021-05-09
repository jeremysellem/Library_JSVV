<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<link rel="stylesheet" href="../css/products.css" />
		<body>
			
			<div id='prod_banner_product'>
			</div>

				<div id="prod_wrap"> 
				<div id="prod_columns" class="prod_col"> 

	
	
				<?php
					include "connexion_bdd.php";
					
					try {
						$sql = "SELECT * FROM Library_JSVV.Livres WHERE Type = 'Autre' ";
						$result = $conn->query($sql);
						$num_rows = $result->fetchColumn();
						$result->execute(); 
						if ($num_rows > 0) {
							
							foreach ($result as $row) {
								echo '<figure>
										<img src='.$row["Lien_image"].'>
										<figcaption >'.$row["Titre"].'</figcaption>
										<figcaption >'.$row["Auteur"].'</figcaption>
										<span class="price">'.$row["Prix"].' EUR</span>
										<a class="prod_button" href="article.php?id='.$row["Livre_ID"].'"> Description</a>
										</figure>';
			
							}
						}
						else {
							echo "0 result";
						}
					}
					catch (Exception $e) {
						echo "0 result".$e;
					}

				?>
	

			</div>
		</div>
	</body>
</head>

</html> 