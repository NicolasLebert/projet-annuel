<?php 

namespace App\Controllers;

use App\Core\View;

class Main
{
	public function default() {
		$v = new View("Main/home", "front");
	}
	
	public function page404() {
		echo "Erreur 404";
	}

	public function users() {
		$v = new View("Main/users", "front");
	}

	public function help() {
		$v = new View("Main/help", "front");
	}
}