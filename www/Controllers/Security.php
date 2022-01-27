<?php 

namespace App\Controllers;

use App\Core\View;
use App\Core\FormVerification;

class Security
{
	public function login() {
		$fvobj = new FormVerification();

		if (!empty($_POST)) {
			$fvobj->checkConnexion($_POST);
		}
		$v = new View("Security/login", "front");
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: /login');
	}

	public function register() {
		$fvobj = new FormVerification();

		if (!empty($_POST)) {
			$fvobj->checkRegistration($_POST);
		}
		$v = new View("Security/register", "front");
	}
}




