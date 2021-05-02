<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Main</title>
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<style type="text/css">

			.top-right {
				position: absolute;
				top: 8px;
				right: 100px;
				text-align: center;
			}

			p {
				font-family: 'Poppins', sans-serif;
				font-size: 60pt;
				color: white;
			}

		</style>
	</head>
	<body>
		<img src="../images/background_office.jpg">
		<div class="top-right">
			<?php if(isset($_SESSION["CUSTOMER_ID"]) && $_SESSION["CUSTOMER_ID"] > 0) : ?>
				<p><?php echo "Welcome Back<br/>".$_SESSION["CUSTOMER_FIRST_NAME"] ?></p>
			<?php  else: ?>
				<p>Welcome !</p>
			<?php endif?>
		</div>
		<div style="text-align: center;">
			<h1>Our products</h1>
		</div>
	</body>
</html>