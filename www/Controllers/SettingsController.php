<?php 

namespace App\Controllers;

use App\Core\View;

class SettingsController
{

	public function notification() {
		$v = new View("Notification/notification", "front");
		$v->firstname = "flauzzz";
	}


	public function toto() {
		echo "toto";
	}

}

