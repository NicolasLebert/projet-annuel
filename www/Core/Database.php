<?php

namespace App\Core;

class Database
{
	protected $db;

	//Connexion à la base de données
	public function __construct()
	{
		try{
			
			// $this->db = new \PDO("mysql:host=database;dbname=mvcdocker2;port=3306","root","password");
			$this->db = new \PDO("mysql:host=localhost;dbname=u246625984_mybdd;port=3306","u246625984_mybddroot","Mybddrootpassword88");
			
			$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

		}catch(\Exception $e){

			die("Erreur SQL : ".$e->getMessage());

		} 

	}

	public function getUseridbyEmail($email){
		$sql = 'SELECT id FROM User WHERE email = :email';
		$prepare = $this->db->prepare($sql);
		$result = $prepare->execute(['email' => $email]);
		$compare = $prepare->fetchAll();
		return $compare[0]['id'];
	}

	public function prepare($query){
		return $this->db->prepare($query);
	}

	//Insérer en base de données l'objet
	//Ou le mettre à jour (INSERT ou UPDATE)
	public function save() 
	{
		//Construire de manière dynamique ma requête SQL
		//exemple générer INSERT INTO gkvw0_user (firstname, lastname, email, pwd) VALUES (......);

		$classExploded = explode("\\", get_called_class());
		$table = end($classExploded) ;



		$columns = get_object_vars($this);
		$toDelete = get_class_vars(get_class());
		$data = array_diff_key($columns, $toDelete);




		if (is_null($this->getId())) {


			$sql = " INSERT INTO ".$table." 
			(". implode(",", array_keys($data)) .") 
			VALUES 
			(:". implode(",:", array_keys($data)) .")";

			$queryPrepared = $this->db->prepare($sql);

			$queryPrepared->execute( $data );
			
		}else {
			//UPDATE
		}

		


	}

}


