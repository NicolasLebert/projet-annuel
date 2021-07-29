<?php 

namespace App\Controllers;

use App\Core\View;

class Main
{

	public function default() {

		
		$v = new View("Main/home", "front");
		$v->firstname = "Yves";
		$v->lastname = "SKRZYPCZYK";
		$v->pseudo = "Prof";

	}


	public function page404() {
		echo "Erreur 404";
	}


	public function toto() {
		echo "toto";
	}

}

