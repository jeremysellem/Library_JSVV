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
	var regexName = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
	return regexName.test(nameStr);
}

/* Email address must ends with .fr or .com according to the assignment*/
function isValidEmail(emailStr) {
	var regexCourriel1 = /.+@.+\.fr/;
	var regexCourriel2 = /.+@.+\.com/;
	return regexCourriel1.test(emailStr) || regexCourriel2.test(emailStr);
}

/* Clients must be legal */
function isValidAge(birthday) {
	var today = new Date();
	var birthday = new Date(birthday);
	var age = (today.getTime() - birthday.getTime())/(1000 * 3600 * 24)/365;
	alert(age);
	return age >= 18.0;
}

/* This function checks most of the fields */
function isValidForm(first, last, e, b, t) {
	var error="";
	if (!(isValidName(first))) {
		error+="First name format incorrect\n";
	}
	if (!(isValidName(last))) {
		error+="Last name format incorrect\n";
	}
	if (!(isValidEmail(e))) {
		error+="Email address format incorrect, must be: example@something.com\n";
	}
	if (!(isValidAge(b))) {
		error+="Age format incorrect, must be greater than 18\n";
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
	var birthday = document.forms["registration_form"]["birthday"].value;

	if (isValidForm(firstname, lastname, email1, birthday)) {
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

