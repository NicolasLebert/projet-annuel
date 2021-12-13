<?php

namespace App\Core;

use App\Core\Singleton;

class Security extends Singleton
{


	public function __construct()
	{
	}


	public function isConnected($email)
	{
		session_start();

		$email = htmlspecialchars($email);
		$query = "SELECT * FROM gkvw0_users WHERE email = ?";
		$prepare = $this->getPDO()->prepare($query);
		$prepare->execute(array($email));
		if ($prepare->rowCount() > 0) {
			$resInfosUser = $prepare->fetch();
			$_SESSION['id'] = $resInfosUser;
		}
	}

	public static function getUser($email)
	{
		return (new self)->isConnected($email);
	}

	public static function generateToken()
	{
		return substr(md5(uniqid(true)), 0, 16);
	}
}
