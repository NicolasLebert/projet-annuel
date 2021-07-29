<?php 

namespace App\Core;

class View
{
	private $template;
	private $view;
	private $data = [];

	public function __construct ($view, $template="back") {
		$this->setTemplate($template);
		$this->setView($view);
	}

	//objectif : debug
	//Afficher les information de la vue pour comprendre ce qu'il y a dedans
    public function __toString(){
    	$msg = "Le template c'est : ".$this->template."<br>";
    	$msg .= "La vue c'est : ".$this->view."<br>";
    	$msg .= "Voici les données  : ".serialize($this->data)."<br>";

    	return $msg;
    }



	public function setTemplate($template){
		//Ici nous n'aurons que front ou back
		if( file_exists("Views/Templates/".$template.".tpl.php")){
			$this->template = "Views/Templates/".$template.".tpl.php";
		}else{
			die("Le template ".$template." n'existe pas ");
		}
	}

	public function setView($view){
		
		//exemple View/Security/login.view.php
		if( file_exists("Views/".$view.".view.php")){
			$this->view = "Views/".$view.".view.php";
		}else{
			die("La vue ".$view." n'existe pas ");
		}
	}

	//Le setter margique est declenché lorsque j'essaye de mettre une valeur
	//dans un attribut qui n'existe pas
	public function __set($name, $value)
    {
        $this->data[$name]=$value;
        
    }



	public function __destruct(){

		// ["fruit"=>"banane", "legume"=>"Choux"]
		// $fruit = "banane"
		// $legume = "Choux"
		extract($this->data);
		require $this->template;
	}

}