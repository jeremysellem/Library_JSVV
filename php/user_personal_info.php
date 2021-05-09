<?php
	session_start();

	try {

		// Initiate connection to DB
		include "connexion_bdd.php";

		// Prepare statement to verify credentials
		$sql = "SELECT * FROM USERS WHERE CUS_ID=\"" . $_SESSION['CUSTOMER_ID'] . "\";";
		
		// Execute query
		$result = $conn->query($sql);

		// Get results
		$user = $result->fetch();
	}
	catch (Exception $e) {
		echo $e;
	}

	$conn = null;

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Personal info</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			body {
				background-color: #F5F5F5;
				margin: 0;
				padding: 0;
			}
			.container {
				text-align: center;
			}
		</style>
	</head>
	<body>

		<!-- Archives Banner -->
		<img src="../images/coffe_blue.jpg" width="100%" height="70%">

		<!-- User info table -->
		<div class="container">
	    	<div class="main-body">
	            <h1 style="margin-bottom: 20px;">Personal information</h1>
	        	<div class="row gutters-sm">
	        		<div class="col-md-4 mb-3">
	        			<div class="card">
	        				<div class="card-body">
	        					<div class="d-flex flex-column align-items-center text-center">
	        						<img src="../images/user.png" alt="Avatar" class="rounded-circle" width="150">
	        						<div class="mt-3">
				                    	<h4><?php echo $user["CUS_FIRST_NAME"] ?></h4>
				                    	<button class="btn btn-primary">Modify</button>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
            		<div class="col-md-8">
            			<div class="card mb-3">
              				<div class="card-body">
                				<div class="row">
                  					<div class="col-sm-3">
                    					<h6 class="mb-0">Full Name</h6>
                    				</div>
	                    			<div class="col-sm-9 text-secondary">
	                    				<?php echo $user["CUS_FIRST_NAME"] . " " . $user["CUS_LAST_NAME"] ?>
	                    			</div>
                    			</div>

                    			<hr>
                  				<div class="row">
                    				<div class="col-sm-3">
                      					<h6 class="mb-0">Email</h6>
                    				</div>
                    				<div class="col-sm-9 text-secondary">
                    					<?php echo $user["CUS_EMAIL"] ?>
                    				</div>
                  				</div>
	                  			<hr>
	                  			<div class="row">
				                    <div class="col-sm-3">
				                    	<h6 class="mb-0">Joined on</h6>
				                    </div>
				                    <div class="col-sm-9 text-secondary">
				                    	<?php echo $user["CUS_JOINDATE"] ?>
				                    </div>
	                  			</div>
	                  			<hr>
	                  			<div class="row">
				                    <div class="col-sm-3">
				                    	<h6 class="mb-0">User</h6>
				                    </div>
				                    <div class="col-sm-9 text-secondary">
				                    	<?php echo $user["CUS_TYPE"] ?>
				                    </div>
	                  			</div>
	                  			<hr>
				                <div class="row">
				                	<div class="col-sm-3">
				                    	<h6 class="mb-0">Address</h6>
				                    </div>
				                    <div class="col-sm-9 text-secondary">
				                    	<?php echo $user["CUS_ADDR"] ?>
				                    </div>
				                </div>
				               	<hr>
				                <div class="row">
				                	<div class="col-sm-3">
				                    	<h6 class="mb-0">Birthday</h6>
				                    </div>
				                    <div class="col-sm-9 text-secondary">
				                    	<?php echo $user["CUS_DOB"] ?>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
			<!-- Update link -->
			<a href="update.php" target="Main">
				<button class="btn btn-primary">Update</button>
			</a>

			<!-- Disconnect button -->
			<button class='btn btn-danger btn-xs' type="submit" name="Logout" onclick="parent.parent.logout_dialog();">
				<span class="fa fa-times">Logout</span>
			</button>
		</div>
	</body>
</html>
