<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Product correctly added</title>
	</head>
	<body>
		<?php
			include "connexion_bdd.php";

			$ok = true;
			try {
				if(($_FILES['image']["type"] == "image/gif") || ($_FILES['image']["type"] == "image/jpeg") || ($_FILES['image']["type"] == "image/jpg") || ($_FILES['image']["type"] == "image/png")) {

					// Format file name
					$imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
					$uploadfile = "../images/" . str_replace(" ", "_", $_POST['title']).".".$imageFileType;

					// Prepare statement
						$sql = "INSERT INTO Livres(Titre, Auteur, Date_parution, ISBN, Prix, Edition, Stock, Resume, Categorie, Lien_image, Type) VALUES (\"".$_POST['title']."\",\"".$_POST['author']."\",".$_POST['year'].",\"".$_POST['ISBN']."\",".$_POST['price'].",\"".$_POST['edition']."\",".$_POST['stock'].",\"".$_POST['story']."\",\"".$_POST['category']."\",\"".$uploadfile."\",\"".$_POST['type']."\");";
					// Execute query
					$result = $conn->query($sql);

					// Save product image
					if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
						echo "File is valid, and was successfully uploaded.\n";
					} else {
					 	echo "This image already exists";
					 	$ok = false;
					}
				}
				else {
					echo "This file is not a picture (format supported GIF, JPEG, JPG, PNG)";
					$ok = false;
				}
			}
			catch (Exception $e) {
				$ok = false;
			}

			$conn = null;

			if($ok) : ?>
				<!-- Banner -->
				<img src="../images/done.jpeg" width="100%" height="100%">
		
				<!-- Message -->
				You successfully added a product to the catalog ! Check it out !

			<?php  else: ?>
				An error occurred while adding the product, please fix it or try again.
			<?php endif?>
	</body>
</html>

		


