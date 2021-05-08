
<?php 
    if (isset($_POST["modify"])) {
    session_start();
    
		include "connexion_bdd.php";

		if( isset($_SESSION["cart"])){
			if (array_key_exists($id, $_SESSION["cart"])) {
				if ($quantity == 0) {
					unset($_SESSION["cart"][$id]);
				}
				else {
					$_SESSION["cart"][$id] =  $quantity;
				}
			}
		}

        // header("Location: ".$_GET["url"]); // to refresh the cart
    }
?>