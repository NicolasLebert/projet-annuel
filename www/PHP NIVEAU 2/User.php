<?php

class User 
{

	//Que du private parce que l'on souhaite harmoniser
	//l'écriture des éléments, exemple le lastname sera en majuscule
	private $firstname;
	private $lastname;
	private $email;
	private $pwd;

	//methode magique : une methode qui va automatiquement
	//être executée à un moment de la vie de l'objet
	//exemple le constructeur est appelé lors de l'instance de la class
	public function __construct($email=null, $pwd=null) {
		$this->setEmail($email);
		$this->setPwd($pwd);
	}

	public function setFirstname($firstname) {
		$this->firstname = ucwords(mb_strtolower(trim($firstname)));
	}
	public function setLastname($lastname) {
		$this->lastname = mb_strtoupper(trim($lastname));
	}
	public function setEmail($email) {
		$this->email = mb_strtolower(trim($email));
	}
	public function setPwd($pwd) {
		$this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
	}


	public function __destruct() {

	}

}

$user1 = new User();
$user1->setFirstname("piERre EmmanueL   ");
$user1->setLastname("SkRZypCZYK");
$user1->setEmail("y.skrzypczyk@GMAIL.COM");
$user1->setPwd("Test1234");






echo "<pre>";
print_r($user2);



