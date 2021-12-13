<?php

namespace App\Core;


class Database
{

    protected static $pdo = null; 

    private function __construct()
    {
    }

    public function getPDO()
    {
        if(is_null(self::$pdo)){
            try {
                self::$pdo = new \PDO("mysql:host=database;dbname=mvcdocker2;port=3306", "root", "password");
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            } catch (\Exception $e) {
    
                die("Erreur SQL : " . $e->getMessage());
            }
        }
       return self::$pdo;
    }

    public function save()
    {
        //Construire de manière dynamique ma requête SQL
        //exemple générer INSERT INTO gkvw0_user (firstname, lastname, email, pwd) VALUES (......);

        $classExploded = explode("\\", get_called_class());
        $table = end($classExploded);



        $columns = get_object_vars($this);
        $toDelete = get_class_vars(get_class());
        $data = array_diff_key($columns, $toDelete);




        if (is_null($this->getId())) {

            $sql = " INSERT INTO gkvw0_" . strtolower($table) . " 
			(" . implode(",", array_keys($data)) . ") 
			VALUES 
			(:" . implode(",:", array_keys($data)) . ")";

            $queryPrepared = $this->getPDO()->prepare($sql);

            $queryPrepared->execute($data);
            echo "HALLO // :" . var_dump($data);
        } else {
            //UPDATE
            foreach (array_keys($columns) as $key) {
                $updates[] = "$key = :$key";
            }
            $queryPrepared = $this->getPDO()->prepare("UPDATE " . $this->table . "SET " . implode(', ', $updates) . " WHERE id = " . $this->getId());

            $queryPrepared->execute($data);
        }
    }
}
