<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Form;
use App\Core\FormVerification;
use App\Core\Security;
use App\Core\Mailer;
use App\Core\Singleton;
use App\Models\User;

class SecurityController
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

		session_start();

		
		$userRegister = new User();
		// $bdd = $userRegister->getPDO();

		$configForm = $userRegister->formRegister();

		$form = new Form($configForm);

		$v = new View("Security/register", "front");


		if (!empty($_POST)) {
			$listOfErrors = FormVerification::check($_POST, $configForm);
			if (empty($listOfErrors)) {
				if ($_POST['password'] == $_POST['passwordConfirm']) {
					//Insertion en base de données + redirection
					print('HOLAAA');
					$userRegister->setFirstname($_POST["firstname"]);
					$userRegister->setLastname($_POST["lastname"]);
					$userRegister->setEmail($_POST["email"]);
					$userRegister->setPwd($_POST["password"]);
					$token = Security::generateToken();
					$userRegister->setToken($token);
					$userRegister->save();

					$query = "SELECT * FROM gkvw0_users WHERE email = ?";
					$prepare = $userRegister->getPDO()->prepare($query);

					// $prepare->execute(array($userRegister->getEmail()));
					// if ($prepare->rowCount() > 0) {
					//     $resInfosUser = $prepare->fetch();
					//     $_SESSION['id'] = $resInfosUser;
					// }
					$userRegister->getUser($_POST["email"]);
					// Mailer::sendActivationMail($userRegister);
					// print('OHYEAH :' . $token);
				} else {
					$v->__set("errors", ["Vos mots de passe ne correspondent pas"]);
				}
			}
			return $listOfErrors;
		}


		$v->form = $form->renderHtml();
		$v->listOfErrors = $listOfErrors ?? [];
	}

	public function confirmRegister()
	{
		$user = new User();
	}
}
