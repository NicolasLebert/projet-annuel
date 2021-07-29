<?php

class Vehicle 
{
	//Attention private veut dire accessible seulement dans la classe
	//Si on veut y acceder depuis les enfants elle doit être en PROTECTED
	private $wheel = 2;

	public function getWheel() {
		return $this->wheel;
	}

	public function setWheel($wheel) {
		$this->wheel = $wheel;
	}
}

//On part du principe qu'une voiture a toujours 4 roues
class Car extends Vehicle
{
	private $belt = 2;

	public function __construct() {
		$this->setWheel(4);
	}

	public function setBelt($belt) {
		$this->belt = $belt;
	}
}

class Moto extends Vehicle
{
	private $helmet = 1;

	public function setHelmet($helmet) {
		$this->helmet = $helmet;
	}


}


$myMoto = new Moto();
$myMoto->setHelmet(2);

//afficher ma moto possède 2 roues
echo "Ma moto possède ".$myMoto->getWheel()." roues<br>";

$myCar = new Car();
$myCar->setBelt(4);

//afficher ma moto possède 2 roues
echo "Ma voiture possède ".$myCar->getWheel()." roues<br>";




