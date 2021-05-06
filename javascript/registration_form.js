/* Displays an indicator below the apssword field meanwhile the user is typing */
function checkPasswordStrength() {
	var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	if($('#password1').val().length<8) {
		$('#password-strength-status').removeClass();
		$('#password-strength-status').addClass('weak-password');
		$('#password-strength-status').html("Weak (should be at least 8 characters.)");
	} else {    
		if($('#password1').val().match(number) && $('#password1').val().match(alphabets) && $('#password1').val().match(special_characters)) {            
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('strong-password');
			$('#password-strength-status').html("Strong");
		} else {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('medium-password');
			$('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
		}
	}
}

/* If the argument starts or ends with a space then return false, else return true. */
function isValidName(nameStr) {
	return nameStr.split("")[0] == " " || nameStr.split("").reverse()[0] == " ";
}

/* Email address must ends with .fr or .com according to the assignment*/
function isValidEmail(emailStr) {
	var regexCourriel1 = /.+@.+\.fr/;
	var regexCourriel2 = /.+@.+\.com/;
	return regexCourriel1.test(emailStr) || regexCourriel2.test(emailStr);
}

/* Clients must be legal */
function isValidAge(ageInt) {
	return parseInt(ageInt) > 120 || parseInt(ageInt) < 18;
}

/* This function checks most of the fields */
function isValidForm(first, last, e, a, t) {
	var error="";
	// if (!(isValidName(first))) {
	// 	error+="BlavBlaBla First name format incorrect, can't contain space at the beginning or at the end\n";
	// }
	// if (!(isValidName(last))) {
	// 	error+="Last name format incorrect, can't contain space at the beginning or at the end\n";
	// }
	if (!(isValidEmail(e))) {
		error+="Email address format incorrect, must be: example@something.com\n";
	}
	if ((isValidAge(a))) {
		error+="Age format incorrect, must be an integer between 18 and 120\n";
	}
	if (error==""){
		return true;
	}
	else {
		alert(error);
		return false;
	}
}

/* Checks the correctness of the form, return false in case of an error */
function validateForm() {
	var firstname = document.forms["registration_form"]["first_name"].value;
	var lastname = document.forms["registration_form"]["last_name"].value;
	var email1 = document.forms["registration_form"]["email1"].value;
	var email2 = document.forms["registration_form"]["email2"].value;
	var password1 = document.forms["registration_form"]["password1"].value;
	var password2 = document.forms["registration_form"]["password2"].value;
	var age = document.forms["registration_form"]["age"].value;

	if (isValidForm(firstname, lastname, email1, age)) {
		var e1 = String(email1);
		var e2 = String(email2);
		if(e1.localeCompare(e2)==0) {
			var pass1 = String(password1);
			var pass2 = String(password2);
			if(pass1.length < 8) {
				alert("Password is too short, must be at least 8 characters long");
				return false; 
			}
			if(pass1.localeCompare(pass2)==0) {
				return true;
			}
			else {
				alert("The passwords don't match, please try again");
				return false;
			}
		}
		else {
			alert("The email addresses don't match, please try again");
			return false;
		}
	}
	else {
		return false;
	}
}

/* Check email value */
function validateLogIn() {
	var email = document.forms["log_in_form"]["email_address"].value;
	if(!isValidEmail(email)) {
		alert("Wrong email/password combination");
		return false;
	}
	return true;
}

