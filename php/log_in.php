<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log in</title>
		<meta charset="UTF-8">
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/home.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<script language="javascript" src="../javascript/registration_form.js"></script>
		<style type="text/css">
			#password-strength-status{padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px; font-size: 10pt;}
			.medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
			.weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
			.strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}

			form {
				max-width: 900px;
				display: block;
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<div>
			<!-- Welcome Banner -->
			<img src="../images/welcome_books.jpg" width="100%" height="100%">

			<!-- Log in form -->
			<form class="p-3" method="POST" action="logged.php" target="_top" id="log_in_form" onsubmit="return validateLogIn()">
				<h1 style="text-align: center;">Log in</h1>
				<div class="form-group">
					<label for="email_address">Email address</label>
					<input type="email" class="form-control" maxlength="40" name="email_address" id="email_address" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" maxlength="16" name="password" id="password" required>
				</div>
				<div>
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
			
			<!-- Registration form -->
			<form class="p-3" method="POST" action="registered.php" target="_top" id="registration_form" onsubmit="return validateForm()">
				<h1 style="text-align: center;">New customer?</h1>
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="text" class="form-control" maxlength="30" name="first_name" id="first_name" required>
				</div>
				<div class="form-group">
					<label for="last_name">Last name</label>
					<input type="text" class="form-control" maxlength="30" name="last_name" id="last_name" required>
				</div>
				<div class="form-group">
					<label for="email1">Email address</label>
					<input type="email" class="form-control" maxlength="40" name="email1" id="email1" required>
				</div>
				<div class="form-group">
					<label for="email2">Confirm email address</label>
					<input type="email" class="form-control" maxlength="40" name="email2" id="email2" required>
				</div>
				<div class="form-group">
					<label for="password1">Password</label>
					<input type="password" class="form-control" maxlength="16" name="password1" id="password1" onKeyUp="checkPasswordStrength();" required>
				</div>
				<div id="password-strength-status"></div>
				<div class="form-group">
					<label for="password2">Confirm password</label>
					<input type="password" class="form-control" maxlength="16" name="password2" id="password2" required>
				</div>
				<div class="form-group">
					<label for="user_type">User type</label>
					<select class="form-control" name="user_type" id="user_type">
						<option value="REGULAR">Regular</option>
						<option value="ADMIN">Administrator</option>
					</select>
				</div>
				<div class="form-group" id="specific_attributes">
					<div class="form-group">
						<label for="birthday">Birth date</label>
						<input type="date" class="form-control" name="birthday" id="birthday" required>
					</div>
					<div class="form-group">
						<label for="postal_address">Postal address</label>
						<input type="text" class="form-control" name="postal_address" id="postal_address" required>
					</div>
				</div>
				<div>
					<input type="submit" class="btn btn-primary" value="Submit"  href="search.php">
				</div>
			</form>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("#user_type").change(function() {
				if ($(this).val() == "REGULAR") {
					$('#specific_attributes').show();
					$('#birthday').attr('required', '');
					$('#birthday').attr('data-error', 'This field is required.');
					$('#postal_address').attr('required', '');
					$('#postal_address').attr('data-error', 'This field is required.');
				} else {
					$('#specific_attributes').hide();
					$('#birthday').removeAttr('required');
					$('#birthday').removeAttr('data-error');
					$('#postal_address').removeAttr('required');
					$('#postal_address').removeAttr('data-error');
				}
			});
			$("#user_type").trigger("change");
		</script>

	</body>
</html>