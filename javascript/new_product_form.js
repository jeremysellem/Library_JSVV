/* Ensure people don't inject queries in form */
function isValidStr(str) {
	var regex = /^[~!@#$%^&*-_+=?><,.';]/;
	regex.test(str);
	return true;
}

function isValidISBN(ISBN) {
	var regex = /^[~!@#$%^&*-_+=?>< ,.';]/;
	regex.test(str);
	return true;
}

/* Checks whether the product info is correct */
function validateNewProductInfo() {
	var title = document.forms["new_product_form"]["title"].value;
	var author = document.forms["new_product_form"]["author"].value;
	var ISBN = document.forms["new_product_form"]["ISBN"].value;
	var edition = document.forms["new_product_form"]["edition"].value;

	if(isValidStr(title)) {
		if(isValidStr(author)) {
			if(isValidISBN(ISBN)) {
				if(isValidISBN(edition)) {
					return true;
				}
				else {
					alert("Special character found in Edition");
				}
			}
			else {
				alert("Special character found in ISBN");
			}
		}
		else {
			alert("Special character found in Author");
		}
	}
	else {
		alert("Special character found in Title");
	}
	return false;
}
