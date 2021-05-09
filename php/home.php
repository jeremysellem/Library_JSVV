<?php
	session_start();
	$_SESSION["cart"] = array();

	// If we just filled the log in form
	if(isset($_SESSION["LOGGING_IN"]) && $_SESSION["LOGGING_IN"] == true) {

		try {

			// Initiate connection to DB
			include "connexion_bdd.php";

			// Prepare statement to verify credentials
			$sql = "SELECT CUS_ID, CUS_FIRST_NAME, CUS_TYPE FROM USERS WHERE CUS_EMAIL=\"" . $_SESSION['email_address'] . "\" AND CUS_PW=\"" . $_SESSION['password'] . "\";";
			
			// Execute query
			$result = $conn->query($sql);

			// Get results
			$user = $result->fetch();

			// Successful credentials ?
			if($user["CUS_ID"] > 0) {
				// Yes then store the CUS_ID in the session
				$_SESSION["CUSTOMER_ID"] = $user["CUS_ID"];
				$_SESSION["CUSTOMER_FIRST_NAME"] = $user["CUS_FIRST_NAME"];
				if($user["CUS_TYPE"] == "ADMIN") {
					$_SESSION["IS_ADMIN"] = true;
				}
				else {
					$_SESSION["IS_ADMIN"] = false;
				}
			}
			else {
				// No then try again
				//echo "Wrong email/password combination, please try again.";
				header("log_in.php");
			}

		}
		catch (Exception $e) {
			echo $e;
		}

		$conn = null;
	}

	$_SESSION["LOGGING_IN"] = false;

	// If we just clicked on Logout
	if(isset($_GET["LOGGING_OUT"]) && $_GET["LOGGING_OUT"] == true) {
		$_SESSION = [];
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/home.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
		<style type="text/css">
			footer {
				height: 80px;
				display: flex;
				justify-content: space-around;
				align-items: center;
				background-color: #7D8B96;
			}

			footer a:hover {
				text-decoration: underline;
				color: white;
				text-underline-offset: 10px;
			}
		</style>
	</head>
	<body>
		<!-- Top of the page -->
		<header>
			<!-- Navigation bar: links to relevant sections -->
			<nav>
				<ul class="navbar">
					<li class="item">
				        <a href="home.php" target="_self" class="logo" style="text-decoration: none;">
				        	<img src="../images/website_logo.png" width="60" height="60">
				        	<h1>J&V Library</h1>
				        </a>
			    	</li>
			    	<li class="item active" id="home">
						<a href="main.php" target="Main">
							<h1>Home</h1>
						</a>
					</li>
			    	<li class="item dropdown">
						<a href="products.php" target="Main">
							<h1>Products</h1>
						</a>
						<ul class="dropdown-content" >
							<li><a href="books.php" target="Main">Books</a></li>
							<li><a href="products.php" target="Main">Stationery</a></li>
						</ul>
					</li>
					<li class="item">
						<a href="search.php" target="Main">
							<h1>Search</h1>
						</a>
					</li>
					<li class="item">
						<a href="panier.php" target="Main" class="logo">
							<img src="../images/panier.png" width="70" height="50">
							<h1>Cart</h1>
						</a>
					</li>
					<li class="item">
						<a href="account.php" target="Main" class="logo">
							<img src="../images/user.png" width="40" height="40">
							<?php if(isset($_SESSION["CUSTOMER_ID"]) && $_SESSION["CUSTOMER_ID"] > 0) : ?>
								<h1><?php echo $_SESSION["CUSTOMER_FIRST_NAME"] ?></h1>
							<?php  else: ?>
								<h1>My Account</h1>
							<?php endif?>
						</a>
					</li>
			    </ul>
	    	</nav>
	    </header>

	    <!-- Main content -->
		<iframe style="width: 100%; min-height: 700px;" id="Main" name="Main" src="main.php" frameBorder="0" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+30)+'px';" scrolling="no" ></iframe>

		<!-- Footer: non-essential information -->
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
	        <a href="main.php" target="Main" style="text-decoration: none;">
	        	<h2>J&V Library &#169;</h2>
	        </a>
	    </footer>

		<!-- Dialog box -->
	    <script type="text/javascript">
	    	function logout_dialog() {
			    bootbox.confirm("Are you sure you want to logout?", function(result) {
			    	if(result) {
			    		window.location.replace("home.php?LOGGING_OUT=true");
			    	}
			    });
			};
	    </script>

	   	<!-- Surbrillance selected tab -->
	    <script type="text/javascript">
	    	$(document).ready(function () {
				$('ul.navbar > li').click(function (e) {
					$('.navbar li').removeClass('active');
					$(this).addClass('active');
				});
			});
	    </script>
	</body>
</html>
