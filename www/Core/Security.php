<?php

namespace App\Core;
use App\Models\User;

class Security
{

    public static function isConnected(){

		session_start();

		return isset($_SESSION['id']);

	}

	public static function getConnectedUser(){

		if(self::isConnected()){
			$user = new User();
			if($user->setAllFromData(["id" => $_SESSION['id']])){
				if($user->isDeleted())
					return null;
				return $user;
			}
		}
		return null;
	}

    public static function generateToken(){
        return substr(md5(uniqid(true)), 0, 16);
    }
}