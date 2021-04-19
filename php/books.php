<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<link rel="stylesheet" href="../css/style.css" />
		<body>
			
			<div id='prod_banner'>
			</div>

				<div id="prod_wrap"> 
				<div id="prod_columns" class="prod_col"> 

	
	
				<?php
					include "connexion_bdd.php";
					
					try {
						$sql = "SELECT * FROM Library_JSVV.Livres";
						$result = $conn->query($sql);
						$num_rows = $result->fetchColumn();
						$result->execute(); /* because fetch is a PDOStatement cursor */
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

					/*$conn-> close();*/
					$conn = null;
				?>
	

			</div>
		</div>
	</body>

	</head>

</html> 