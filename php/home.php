<!--
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
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script>
			function resizeIframe(obj) {
				obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
			}
		</script>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li>
				        <a href="../html/main.html" target="Main" class="logo">
				        	<img src="../images/website_logo.png" width="60" height="60">
				        	<h1>J&V Library</h1>
				        </a>
			    	</li>
			    	<li>
						<a href="../html/main.html" target="Main">
							<h1>Home</h1>
						</a>
					</li>
			    	<li>
						<a href="products.php" target="Main">
							<h1>Products</h1>
						</a>
					</li>
					<li>
						<a href="books.php" target="Main">
							<h1>Books</h1>
						</a>
					</li>
					<li>
						<a href="buy.php" target="Main">
							<h1>Buy</h1>
						</a>
					</li>
					<li>
						<a href="update.php" target="Main">
							<h1>Update</h1>
						</a>
					</li>
			    </ul>
	    	</nav>
	    </header>
		<iframe style="width: 100%;" name="Main" src="../html/main.html" frameBorder="0" onload="resizeIframe(this)" scrolling="no" ></iframe>
		<footer>
			<a href="about_us.php" target="Main">
				<h2>About Us</h2>
			</a>

			<a href="contact.php" target="Main">
				<h2>Contact</h2>
			</a>
			<a href="legal.php" target="Main">
				<h2>Legal</h2>
			</a>
	        <a href="../html/main.html" target="Main" class="logo">
	        	<img src="../images/website_logo.png" width="60" height="60">
	        	<h2>J&V Library</h2>
	        </a>
	    </footer>
	</body>
</html>
