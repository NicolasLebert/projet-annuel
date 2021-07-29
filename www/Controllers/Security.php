<?php 

namespace App\Controllers;

use App\Core\View;
use App\Core\Form;
use App\Core\FormVerification;
use App\Models\User;

class Security
{

	public function login() {
		//Afficher la vue login à l'interieur du template front
		$v = new View("Security/login", "front");
	}

	public function logout() {
		echo "Security/logout";
		//Redirection sur la home
	}

	public function register() {

		$user = new User();
		$configForm = $user->formRegister();

		$form = new Form($configForm);

		if (!empty($_POST)) {
			$listOfErrors = FormVerification::check($_POST, $configForm);
			if(empty($listOfErrors)){
				//Insertion en base de données + redirection
				/*
				$user->setFirstname("Yves");
				$user->setLastname("SKRZYPCZYK");
				$user->setEmail("y.skrzypczyk@gmail.com");
				$user->setPwd("Test1234");
				$user->save();
				*/
			}
			//Sinon afficher dans la vue les erreurs
		}


		$v = new View("Security/register", "front");
		$v->form = $form->renderHtml();
		$v->listOfErrors = $listOfErrors??[];



	}
	
}




