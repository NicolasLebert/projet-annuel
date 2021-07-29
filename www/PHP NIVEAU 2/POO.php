<?php

// Plan de la maison
// Class Maison -> Pascal Case

class Maison {

	//Attributs avec des valeurs par défaut

	//Public signifie que l'on peut y acceder de partout
	//depuis la class mais aussi depuis l'objet
	public $color = "grey";

	//private signifie que l'attribut n'est accessible que dans la class
	//mais plus par l'objet directement
	private $floor = 0;

	public $fundation = 1;
	public $door = 1;
	public $wall = 4;
	public $window = 1;
	public $roof = 1;

	//Méthode : augmenter de 1 les étages et ajouter 4 murs à l'objet
	//qui le demande
	public function addFloor(){
		//objet courant : $this
		$this->floor++;
		$this->wall+=4;
	}

	public function getFloor() {
		return $this->floor;
	}

}



//Il s'agit d'un autre objet basé sur la même class
$maMaison2 = new Maison();

//Ajout d'un étage
$maMaison2->addFloor();
$maMaison2->addFloor();

//Ok parce que changer la couleur n'a pas 
//d'impact sur la structure d'une maison
$maMaison2->color = "red";

//Fatal error: Uncaught Error: Cannot access private property Maison::$floor
//$maMaison2->floor++;

print_r($maMaison2);

//Afficher : Votre maison possedera 1 étage(s)
echo "Votre maison possedera ".$maMaison2->getFloor()." étage(s)";



