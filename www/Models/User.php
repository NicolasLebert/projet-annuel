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
        $this->pwd = crypt($pwd, "projet");
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
}




