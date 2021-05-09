<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>Product Management Data Table</title>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script language="javascript" src="../javascript/new_product_form.js"></script>
		<style type="text/css">
			body {
				background-color: #F5F5F5;
				margin: 0;
				padding: 0;
			}
			form {
				max-width: 900px;
				display: block;
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<!-- Banner -->
		<img src="../images/new_product.jpg" width="100%" height="100%">
		
		<!-- Form -->
		<div>
			<form class="p-3" method="POST" action="product_added.php" target="_self" id="new_product_form" onsubmit="return validateNewProductInfo()" enctype="multipart/form-data">
				<h1 style="text-align: center;">New product?</h1>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" maxlength="40" name="title" id="title" required>
				</div>
				<div class="form-group">
					<label for="author">Author</label>
					<input type="text" class="form-control" maxlength="40" name="author" id="author" required>
				</div>
				<div class="form-group">
					<label for="year">Released in</label>
					<input type="number" min="-500" max="2021" value="2021" class="form-control" name="year" id="year" required>
				</div>
				<div class="form-group">
					<label for="ISBN">ISBN</label>
					<input type="text" class="form-control" minlength="10" maxlength="10" name="ISBN" id="ISBN" required>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="number" min="0.01" step="0.01" class="form-control" name="price" id="price" required>
				</div>
				<div class="form-group">
					<label for="edition">Edition</label>
					<input type="text" maxlength="40" class="form-control" name="edition" id="edition" required>
				</div>
				<div class="form-group">
					<label for="stock">Quantity</label>
					<input type="number" min="0" class="form-control" name="stock" id="stock" required>
				</div>
				<div class="form-group">
					<label for="story">Synopsis</label>
					<textarea style="height: 150px;" id="story" name="story" maxlength="1000" class="form-control" required></textarea>
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-group" name="category" id="category" required>
						    <option value="Theatre">Theatre</option>
						    <option value="French_literature">French literature</option>
						    <option value="Poetry">Poetry</option>
						</select>
						<label for="category">Type</label>
						<select class="form-group" name="type" id="type" required>
						    <option value="Livre">Livre</option>
						    <option value="Autre">Autre</option>
						</select>
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" class="form-control" name="image" id="image">
					</div>
				</div>
				<div>
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
	</body>
</html>