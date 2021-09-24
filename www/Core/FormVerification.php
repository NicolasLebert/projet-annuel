<?php

namespace App\Core;

class FormVerification 
{

	private $Errors = [];

	public static function check ($data, $config) {
		echo "<pre>";
		print_r($data);
		print_r($config);
		//A faire :
		//Il faut vérifier tous les champs que l'internaute aura rempli
		//Pour vérifier un champs il faut se baser sur plusieurs informations
		// -> type, exemple si email utiliser filter_var
		// -> minLength, vérifier la longueur
		// -> maxLength, vérifier la longueur
		// -> required, not empty
		// -> select , vérifier que la data correspond à une des options
		// -> confirm, vérifier qu'il correspond au bon champs
		// -> unicity, la valeur n'est pas déjà en base de données

		return true; // false si erreur
	}

	public function checkEmail($email){
		if (empty($email)) {
            $this->Errors[] = "Veuillez à renseigner votre Email";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->Errors[] = "Votre Email n'est pas valide";
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
            $this->Errors[] = "Votre mot de passe n'est pas assez long (2 caractères minimum)";
        }
        if (strlen($password) > $maxLenght) {
            $this->Errors[] = "Votre mot de passe est trop long (32 caractères maximum)";
        }
	}

	public function checkConnexion ($data, $config) {
		
		self::checkEmail($data['email']);
		self::checkPassword($data['password'], 2, 32);
		
		echo "<pre>";
		print_r($this->Errors);
		print_r($data);
		print_r($config);
		echo "</pre>";

		if (!empty($this->Errors)) {
			implode("\n", $this->Errors);
		}else{
			//aucune erreurs
			$db = new Database();
			
			if (empty($db->ConnexionValidation($data['email'], $data['password']))) {
				$this->Errors[] = "Email et/ou mot de passe introuvables";
				implode("\n", $this->Errors);
			}else {
				//La session démarre
				echo "Session initialisée";
				session_start();
			}
		}

		//A faire :
		//vérifier les champs
		//connexion bdd
		//comparer les champs avec bdd
		//démarrer la session

	}

}