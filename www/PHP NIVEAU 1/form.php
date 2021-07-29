<?php include "header.php"; ?>


<?php



	$listOfErrors = [];

	//Vérification globale
	if( count($_POST) == 5 
		&& !empty($_POST["firstname"])  
		&& !empty($_POST["lastname"])  
		&& !empty($_POST["email"])  
		&& !empty($_POST["pwd"])  
		&& !empty($_POST["pwdConfirm"]) ){


		//Nettoyage 
		$_POST["firstname"] = ucwords(mb_strtolower(trim($_POST["firstname"])));
		$_POST["lastname"] = mb_strtoupper(trim($_POST["lastname"]));
		$_POST["email"] = mb_strtolower(trim($_POST["email"]));

		


		if( strlen($_POST["firstname"])<2 || strlen($_POST["firstname"])>120) {
			$listOfErrors[] =  "Votre prénom doit faire plus de 2 caractères et moins de 120";
		}

		if( strlen($_POST["lastname"])<2 || strlen($_POST["lastname"])>255) {
			$listOfErrors[] =  "Votre nom doit faire plus de 2 caractères et moins de 255";
		}

		if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
			$listOfErrors[] =  "Le format de votre email est incorrect";
		}




		if( strlen($_POST["pwd"])<8 ) {
			$listOfErrors[] =  "Votre mot de passe doit faire au minimum 8 caractères";
		}

		if( $_POST["pwd"] != $_POST["pwdConfirm"]) {
			$listOfErrors[] =  "Le mot de passe de Confirmation ne correspond pas";
		}


		if( count($listOfErrors) == 0){
			//Insertion en bdd
			$passwordHashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
			echo $passwordHashed;
		}


	}



		if( count($listOfErrors) > 0){
			foreach ($listOfErrors as $error) {
				echo "<li>".$error; 
			}
		}


?>

<!-- GET | POST -->


Bonjour &lt;Yves

<form method="POST" action="">

	<input type="text" name="firstname" placeholder="Prénom" required="required" 
	value="<?= $_POST["firstname"]??"" ?>"><br>
	<input type="text" name="lastname" placeholder="Nom" required="required" value="<?= $_POST["lastname"]??"" ?>"><br>
	<input type="email" name="email" placeholder="Email" required="required" value="<?= $_POST["email"]??"" ?>"><br>

	<input type="password" name="pwd" placeholder="Mot de passe" required="required"><br>
	<input type="password" name="pwdConfirm" placeholder="Confirmation" required="required"><br>

	<input type="submit" value="S'inscrire">
</form>



<?php include "footer.php"; ?>


