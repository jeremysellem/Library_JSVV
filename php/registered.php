
<?php

	class User {

		private $_first_name; // Prénom
		private $_last_name; // Nom de famille
		private $_email_address; // Adresse mail
		
		// Constructeur prenant en arguments les attributs de base
		protected function __construct($first, $last, $email) { 
			$this->SetFirstName($first);
			$this->SetLastName($last);
			$this->SetEmailAddress($email);
		}

		// Getter de l'attribut Prénom
		public function GetFirstName() {
			return $this->_first_name;
		}

		// Getter de l'attribut Nom de famille
		public function GetLastName() {
			return $this->_last_name;
		}

		// Getter de l'attribut Adresse mail
		public function GetEmailAddress() {
			return $this->_email_address;
		}

		// Setter de l'attribut Prénom
		private function SetFirstName($first) {
			$this->_first_name = $first;
		}

		// Setter de l'attribut Nom de famille
		private function SetLastName($last) {
			$this->_last_name = $last;
		}

		// Setter de l'attribut Adresse mail
		private function SetEmailAddress($email) {
			$this->_email_address = $email;
		}

		// Affichage des attributs
		public function Display() {
			echo "<div class='recap'> First name: " . $this->GetFirstName() . "<br/>Last name: " . $this->GetLastName() . "<br/>Email address: " . $this->GetEmailAddress() . "<br/></div>";
		}

		// Exporter tous les attributs de l'utilisateur sous forme de string
		public function Export() {
			return "First name: " . $this->GetFirstName() . "\nLast name: " . $this->GetLastName() . "\nEmail address: " . $this->GetEmailAddress() . "\n";
		}

	}

	class Administrator extends User {

		private $_can_Update; // Droit de mise à jour 
		private $_can_Display; // Droit d'affichage
		private $_can_Delete; // Droit de suppression

		// Constructeur utilisant le super constructeur 
		public function __construct($first, $last, $email) { 
			parent::__construct($first, $last, $email);
			$this->SetCanUpdate(true);
			$this->SetCanDisplay(true);
			$this->SetCanDelete(true);
		}

		// Setter de l'attribut Droit de mise à jour 
		private function SetCanUpdate($boolean) {
			$this->_can_Update = $boolean;
		}

		// Setter de l'attribut Droit d'affichage
		private function SetCanDisplay($boolean) {
			$this->_can_Display = $boolean;
		}

		// Setter de l'attribut Droit de suppression
		private function SetCanDelete($boolean) {
			$this->_can_Delete = $boolean;
		}

		// Si l’attribut _can_Update est true, l’administrateur peut ajouter un nouveau produit au panier
		public function AdmUpdate($cart, $product) {
			if($this->_can_Update) {
				$cart[] = $product;
			}
			else {
				echo "You can't update";
			}
		}

		// Si l’attribut _can_Display est true, l’administrateur peut afficher le contenu du panier
		public function AdmDisplay($cart) {
			if($this->_can_Display) {
				echo $cart;
			}
			else {
				echo "You can't display";
			}
		}

		// Si l’attribut Can_Delete est true, l’administrateur peut supprimer un produit au panier
		public function AdmDelete($cart, $product) {
			if($this->_can_Delete) {
				unset($cart[$product]);
			}
			else {
				echo "You can't delete";
			}
		}

		// Affichage des attributs
		public function Display() {
			echo parent::Display() . "Can update: " . $this->_can_Update . "<br/>Can display: " . $this->_can_Display . "<br/>Can delete: " . $this->_can_Delete . "<br/>";
		}

		// Exporter tous les attributs de l'utilisateur sous forme de string
		public function Export() {
			return parent::Export() . "Can update: " . $this->_can_Update . "\nCan display: " . $this->_can_Display . "\nCan delete: " . $this->_can_Delete . "\n";
		}

	}

		class Regular extends User {

			private $_age; // Age
			private $_postal_address; // Adresse postale
			private $_cart; // Panier

			// Constructeur utilisant le super constructeur 
			public function __construct($first, $last, $email, $age, $postal) { 
				parent::__construct($first, $last, $email);
				$this->_age = $age;
				$this->_postal_address = $postal;
				$this->_cart = array();
			}

			// Un produit passé en paramètre sera ajouté au tableau Panier
			public function AjoutPanier($product) {
				array_push($_cart, $product);
			}

			public function getCart() {
				return $this->_cart;
			}

			// Affichage des attributs
			public function Display() {
				echo parent::Display() . "<div class ='recap'> Age: " . $this->_age . "<br/>Postal address: " . $this->_postal_address . "<br/>Cart: " . implode(", ", $this->_cart) . "<br/></div>";
			}

			// Exporter tous les attributs de l'utilisateur sous forme de string
			public function Export() {
				return parent::Export() . "Age: " . $this->_age . "\nPostal address: " . $this->_postal_address . "\nCart: " . implode(", ", $this->_cart) . "\n";
			}

		}


			// if($_POST['user_type'] == "admin") {
			// 	echo "<h3> Bonjour ".$_POST['first_name']. ", vous pouvez sélectionner les articles que vous souhaitez réserver. </h3>";
			// 	$u = new Administrator($_POST['first_name'], $_POST['last_name'], $_POST['email_address']);
			// 	$u->Display();
			// }
			// else {
			// 	echo "<h1>Recapitulatif de vos informations</h1>";
			// 	$u = new Regular($_POST['first_name'], $_POST['last_name'], $_POST['email_address'], $_POST['age'], $_POST['postal_address']);
			// 	$u->Display();
			// 	echo "<h3> Bonjour ".$_POST['first_name']. ", vous pouvez sélectionner les articles que vous souhaitez réserver. </h3>";
			// 	$file = 'users.txt'; // Nom du fichier contenant les informations
			// 	$current = file_get_contents($file); // Ouvre un fichier pour lire un contenu existant
			// 	$current .=  $u->Export() . "\n"; // Ajoute l'utilisateur nouvellement créé
			// 	file_put_contents($file, $current); // Écrit le résultat dans le fichier
			// 	}

		?>

		


	</body>
</html>

