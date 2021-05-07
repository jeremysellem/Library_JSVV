

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Header</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <header>
			<!-- Navigation bar: links to relevant sections -->
			<nav>
				<ul class="navbar">
					<li class="nav-item">
				        <a href="home.php" target="_self" class="logo" style="text-decoration: none;">
				        	<img src="../images/website_logo.png" width="60" height="60">
				        	<h1>J&V Library</h1>
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
						<a href="Search.php" target="Main">
							<h1>Search</h1>
						</a>
					</li>
					<li class="nav-item">
						<a href="panier.php" target="Main" class="logo">
							<img src="../images/panier.png" width="70" height="50">
							<h1>Basket</h1>
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
    </body>
</html>

            

