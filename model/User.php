<?php

class User
{

	//Liste des propriétés
	private $_id;
	private $_pseudo;
	private $_pass;
	private $_email;
	private $_access;

	// Constructeur
	public function __construct($data)
	{
		$this->hydrate($data);
	}


	// Méthode d'hydratation
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
  		{

    	// On récupère le nom du setter correspondant à l'attribut
    	$method = 'set'.ucfirst($key);  

	    	// Si le setter correspondant existe
	    	if (method_exists($this, $method))
	    	{
	      		// On appelle le setter
	      		$this->$method($value);
	    	}
	    }
	}


	//Liste des getters
	public function id() { return $this->_id; }
	public function pseudo() { return $this->_pseudo; }
	public function pass() { return $this->_pass; }
	public function email() { return $this->_email; }
	public function access() { return $this->_access; }


	//Liste des setters
	public function setId($id)
	{
		$this->_id = (int) $id;
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo) && strlen($pseudo) > 1 && strlen($pseudo) <= 25)  
		{
			$this->_pseudo = $pseudo;
		}
	}

	public function setPass($pass)
	{
		if(strlen($pass) >= 8 && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pass))
		{
			$this->_pass = $pass;
		}
	}

	public function setEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$this->_email = $email;
		}
	}

	public function setAccess($access)
	{
		$access = (int) $access;

		if ($access == 1 || $access == 2) 
		{
			$this->_access = $access;
		}
	}
}
