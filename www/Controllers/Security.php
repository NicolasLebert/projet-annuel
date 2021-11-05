<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Form;
use App\Core\FormVerification;
use App\Models\User;

class Security
{

	public function login()
	{
		//Afficher la vue login à l'interieur du template front
		$v = new View("Security/login", "front");
	}

	public function logout()
	{
		echo "Security/logout";
		//Redirection sur la home
	}

	public function register()
	{

		$user = new User();
		$configForm = $user->formRegister();

		$form = new Form($configForm);

		$v = new View("Security/register", "front");


		if (!empty($_POST)) {
			$listOfErrors = FormVerification::check($_POST, $configForm);
			if (empty($listOfErrors)) {
				if ($_POST['password'] == $_POST['passwordConfirm']) {
					//Insertion en base de données + redirection
					print('HOLAAA');
					$user->setFirstname($_POST["firstname"]);
					$user->setLastname($_POST["lastname"]);
					$user->setEmail($_POST["email"]);
					$user->setPwd($_POST["password"]);
					$user->save();
					print('OHYEAH');
				} else {
					$v->__set("errors", ["Vos mots de passe ne correspondent pas"]);
				}
			}
			return $listOfErrors;
		}


		$v->form = $form->renderHtml();
		$v->listOfErrors = $listOfErrors ?? [];
	}

	public function confirmRegister(){
		$user = new User();
	}
}
