<?php

namespace App\Core;

class FormVerification 
{

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

	public static function checkEmail($email){

		return true // or false
	}
	public static function checkMinLength($string){

		return true // or false
	}
	public static function checkMaxLength($string){

		return true // or false
	}

}