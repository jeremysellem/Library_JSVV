<?php
	$servname = 'localhost';
	$dbname = 'online_library';
	$username = 'root';
	$password = 'root';
	try {
		$conn = new PDO("mysql:host=$servname;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail) VALUES('Emmanuel','Cruise','Avenue des Champs Elysées','Paris',75008,'France','emmanuel.cruise90@gmail.com')";
		$conn->exec($sql);
		echo 'Entrée ajoutée dans la table';
	}

	catch(Exception $e){
		echo "Error: " . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<body>
		<div id="Logo">
			<a href="home.php">
				Image Logo
			</a>
			<li>
				Cette div contient le logo persistant qui en cliquant revient vers la page principale.
			</li>
		</div>
		<div id="Menu">
			<a href="products.php">
				Products
			</a>
			<a href="books.php">
				Books
			</a>
			<a href="purchase.php">
				Purchase
			</a>
			<a href="update.php">
				Update
			</a>
			<li>
				Cette div contient les liens vers les autres parties du site.
			</li>
		</div>
		<div id="Presentation">
			<li>
				Cette div contient des images, des textes, des produits mis en avant, ou encore des promotions.
			</li>
		</div>
		<div id="Footer">
			<a href="about_us.php">
				About Us
			</a>
			<a href="contact.php">
				Contact
			</a>
			<a href="legal.php">
				Legal
			</a>
			<a href="home.php">
				Image Logo
			</a>
			<li>
				Cette div contient les informations pratiques et les liens vers d'autres pages moins importantes.
			</li>
		</div>
	</body>
</html>
