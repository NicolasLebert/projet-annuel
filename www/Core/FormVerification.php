<?php

namespace App\Core;
use App\Core\Database;
use App\Models\User;

class FormVerification 
{
	private $Errors = [];

	public function checkFirstname($firstname, $minLenght, $maxLenght){
		if (empty($firstname)) {
            $this->Errors[] = "Veuillez renseigner votre prénom";
        }
        if (gettype($firstname) != "string") {
            $this->Errors[] = "Votre prénom n'est pas valide";
        }
        if (strlen($firstname) < $minLenght) {
            $this->Errors[] = "Votre prénom n'est pas assez long (2 caractères minimum)";
        }
        if (strlen($firstname) > $maxLenght) {
            $this->Errors[] = "Votre prénom est trop long (32 caractères maximum)";
        }
	}

	public function checkLastname($lastname, $minLenght, $maxLenght){
		if (empty($lastname)) {
            $this->Errors[] = "Veuillez renseigner votre nom de famille";
        }
        if (gettype($lastname) != "string") {
            $this->Errors[] = "Votre nom de famille n'est pas valide";
        }
        if (strlen($lastname) < $minLenght) {
            $this->Errors[] = "Votre nom de famille n'est pas assez long (2 caractères minimum)";
        }
        if (strlen($lastname) > $maxLenght) {
            $this->Errors[] = "Votre nom de famille est trop long (255 caractères maximum)";
        }
	}

	public function checkEmail($email, $unicityCheck){
		if (empty($email)) {
            $this->Errors[] = "Veuillez à renseigner votre Email";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->Errors[] = "Votre Email n'est pas valide";
        }
		if ($unicityCheck) {
			$db = new Database();
			$sql = 'SELECT email FROM User WHERE email = :email';
			$prepare = $db->prepare($sql);
			$result = $prepare->execute(['email' => $email]);
			$compare = $prepare->fetchAll();

			if (!empty($compare)) {
				$this->Errors[] = "Cette adresse Email est déjà utilisé sur notre plateforme";
			}
		}
	}

	public function checkPassword($password, $minLenght, $maxLenght){
		if (empty($password)) {
            $this->Errors[] = "Veuillez renseigner votre mot de passe";
        }
        if (gettype($password) != "string") {
            $this->Errors[] = "Votre mot de passe n'est pas valide";
        }
        if (strlen($password) < $minLenght) {
            $this->Errors[] = "Votre mot de passe n'est pas assez long (8 caractères minimum)";
        }
        if (strlen($password) > $maxLenght) {
            $this->Errors[] = "Votre mot de passe est trop long (32 caractères maximum)";
        };
		if (preg_match_all( "/[0-9]/", $password ) < 2) {
            $this->Errors[] = "Votre mot de passe ne comporte pas ou pas assez de chiffre (2 minimum)";
        }
		if (preg_match_all( "/[A-Z]/", $password ) < 1) {
            $this->Errors[] = "Votre mot de passe ne comporte pas de majuscule (1 minimum)";
        }
	}

	public function connexionValidation ($email, $password) {
		$db = new Database();

		$sql = 'SELECT email, pwd FROM User WHERE email = :email';
		$prepare = $db->prepare($sql);
		$result = $prepare->execute(['email' => $email]);
		$compare = $prepare->fetchAll();

		if (empty($compare)) {
			return false;
		}else{
			if ($compare[0]['pwd'] == crypt($password, "projet")) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function checkConnexion ($data) {
		
		self::checkEmail($data['email'], false);
		self::checkPassword($data['password'], 8, 32);
		
		if (!empty($this->Errors)) {
			echo "<pre>";
			print_r($this->Errors);
			echo "</pre>";
		}else{
			if (!self::connexionValidation($data['email'], $data['password'])) {
				echo "Email et/ou mot de passe introuvables";
			}else {
				session_start();
				$db = new Database();
				$_SESSION['userID'] = $db->getUseridbyEmail($data['email']);
				header('Location: /users');
			}
		}
	}

	public function inscriptionValidation ($data) {		
		$user = new User();
		$user->setFirstname($data['firstname']);
		$user->setLastname($data['lastname']);
		$user->setEmail($data['email']);
		$user->setPwd($data['password']);
		$user->save();
	}

	public function checkRegistration ($data) {
		
		self::checkFirstname($data['firstname'], 2, 32);
		self::checkLastname($data['lastname'], 2, 255);
		self::checkEmail($data['email'], true);
		self::checkPassword($data['password'], 8, 32);
		
		if (!empty($this->Errors)) {
			echo "<pre>";
			print_r($this->Errors);
			echo "</pre>";
		}else{
			self::inscriptionValidation($data);
			mail($data['email'], 'Bienvenue sur mon site', 'Bonjour '. $data['firstname'] . ' ' . $data['lastname'] . ",\r\n\r\nMerci de vous être inscrit sur notre plateforme.\r\nCordialement,\r\nLEBERT Nicolas.");
			session_start();
			$db = new Database();
			$_SESSION['userID'] = $db->getUseridbyEmail($data['email']);
			header('Location: /users');
		}
	}

}