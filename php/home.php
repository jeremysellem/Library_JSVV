<?php
	session_start();

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
				
				echo "You are now connected. Please move on to the catalog to make your purchase.";
			}
			else {
				// No then try again
				echo "Wrong email/password combination, please try again.";
			}

		}
		catch (Exception $e) {
			echo $e;
		}

		$conn = null;
	}

	$_SESSION["LOGGING_IN"] = false;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body>
		<!-- Top of the page -->
		<header>
			<!-- Navigation bar: links to relevant sections -->
			<nav>
				<ul class="navbar-nav">
					<li class="nav-item">
				        <a href="home.php" target="_self" class="logo" style="text-decoration: none;">
				        	<img src="../images/website_logo.png" width="60" height="60">
				        	<h1 style="color: #1E1E1E;">J&V Library</h1>
				        </a>
			    	</li>
			    	<li class="nav-item active" id="home">
						<a href="main.php" target="Main">
							<h1>Home</h1>
						</a>
					</li>
			    	<li class="nav-item">
						<a href="products.php" target="Main">
							<h1>Products</h1>
						</a>
					</li>
					<li class="nav-item">
						<a href="books.php" target="Main">
							<h1>Books</h1>
						</a>
					</li>
					<li class="nav-item">
						<a href="update.php" target="Main">
							<h1>Update</h1>
						</a>
					</li>
					<li class="nav-item">
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
		<iframe style="width: 100%;" id="Main" name="Main" src="main.php" frameBorder="0" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px';" scrolling="no" ></iframe>
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
	        <a href="../html/main.html" target="Main" style="text-decoration: none;">
	        	<h2>J&V Library &#169;</h2>
	        </a>
	    </footer>
	    <script type="text/javascript">
	    	$(document).ready(function () {
				$('ul.navbar-nav > li').click(function (e) {
					$('.navbar-nav li').removeClass('active');
					$(this).addClass('active');
				});
			});
	    </script>
	</body>
</html>
