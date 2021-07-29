<?php

namespace App\Models;

use App\Core\Database;

class User extends Database
{

	private $id = null;

	protected $firstname;
	protected $lastname;
	protected $email;
	protected $pwd;

	protected $status = 0;
	protected $role = 0;

	private $dateInserted;
	private $dateUpdated;


	//Il s'agit d'une surcharge du constructeur Parent
	public function __construct()
	{
		parent::__construct();
	}




	public function __toString(){
		return $this->firstname." ".$this->lastname;
	}


    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = ucwords(mb_strtolower(trim($firstname)));
    }

    /**
     * @return mixed
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = mb_strtoupper(trim($lastname));
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = mb_strtolower(trim($email));
    }

    /**
     * @return mixed
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd): void
    {
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getDateInserted(): timestamp
    {
        return $this->dateInserted;
    }

    /**
     * @param mixed $dateInserted
     */
    public function setDateInserted($dateInserted): void
    {
        $this->dateInserted = $dateInserted;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated(): timestamp
    {
        return $this->dateUpdated;
    }

    /**
     * @param mixed $dateUpdated
     */
    public function setDateUpdated($dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }



    public function formRegister () {

        return [
                    "action"=>"",
                    "method"=>"POST",
                    "submit"=>"S'inscrire",
                    "inputs"=> [
                                    "firstname"=>[
                                                    "type"=>"text", 
                                                    "required"=>true,
                                                    "placeholder"=>"Votre Prénom",
                                                    "minLength"=>2,
                                                    "value"=>"Yves",
                                                    "error"=>"Votre prénom doit faire au minimum 2 caractères"
                                                ],
                                    "lastname"=>[
                                                    "type"=>"text", 
                                                    "required"=>true,
                                                    "placeholder"=>"Votre Nom",
                                                    "minLength"=>2,
                                                    "error"=>"Votre nom doit faire au minimum 2 caractères"
                                                ],
                                    "country"=>[
                                                    "type"=>"select", 
                                                    "required"=>true,
                                                    "placeholder"=>"Votre Pays",
                                                    "options"=>["fr","en"]
                                                ],
                                    "email"=>[
                                                    "type"=>"email", 
                                                    "unicity"=>"email",
                                                    "required"=>true,
                                                    "placeholder"=>"Votre Email",
                                                    "error"=>"Votre email n'est pas correct"
                                                ],
                                    "password"=>[
                                                    "type"=>"password", 
                                                    "required"=>true,
                                                    "placeholder"=>"Votre mot de passe",
                                                    "minLength"=>4,
                                                    "maxLength"=>32,
                                                    "error"=>"Votre mot de passe doit faire entre 4 et 32 caractères"
                                                ],
                                    "passwordConfirm"=>[
                                                    "type"=>"password", 
                                                    "required"=>true,
                                                    "placeholder"=>"Confirmation du mot de passe",
                                                    "confirm"=>"password",
                                                    "error"=>"Les mots de passe ne correspondent pas"
                                                ],
                                    "captcha"=>[
                                                    "type"=>"captcha", 
                                                    "required"=>true,
                                                    "placeholder"=>"Saisir le captcha",
                                                    "src"=>"/captcha.php",
                                                    "error"=>"Le captcha ne correspond pas"
                                                ]
                                                            


                                ]
                ];

    }


}




