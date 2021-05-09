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

				$target_dir = "uploads/";
				$uploaded_file = $target_dir . basename($_FILES["image"]["name"]);
				$imageFileType = strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION));

				$target_file = "../images/" . str_replace(" ", "_", $_POST['title']).".".$imageFileType;

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$ok = false;
				}
				else {
					// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["image"]["tmp_name"]);
					if($check) {
						// Prepare statement
						$sql = "INSERT INTO Livres(Titre, Auteur, Date_parution, ISBN, Prix, Edition, Stock, Resume, Categorie, Lien_image) VALUES (\"".$_POST['title']."\",\"".$_POST['author']."\",".$_POST['year'].",\"".$_POST['ISBN']."\",".$_POST['price'].",\"".$_POST['edition']."\",".$_POST['stock'].",\"".$_POST['story']."\",\"".$_POST['category']."\",\"".$target_file."\");";
						// Execute query
						$result = $conn->query($sql);

						if(!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						    $ok = false;
						}
					}
					else {
						$ok = false;
					}
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

		


