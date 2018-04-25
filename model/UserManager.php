<?php

require_once("model/Database.php");

class UserManager extends Database
{
	
	public function addUser(User $user)
	{

		$db = $this->db_connect();

		$req = $db->prepare("
			INSERT INTO user (pseudo, pass, email, access) 
			VALUES (:pseudo, :pass, :email, :access)");

		$req->execute(array(
			'pseudo' => $user->pseudo(),
			'pass' => $user->pass(),
			'email' => $user->email(),
			'access' => 2));

		$req->closeCursor();
		
	}

	public function deleteUser(User $user)
	{
		$db = $this->db_connect();

		$this->$db->exec('DELETE FROM user WHERE id = ' . $user->id());
	}

	public function getUser($pseudo)
	{
		$db = $this->db_connect();

		$req = $db->query('SELECT id, pseudo, email, pass, access FROM user WHERE pseudo = "' . $pseudo . '"');
		$data = $req->fetch();
		
		return new User($data);
	}

	public function getListUser()
	{
		$db = $this->db_connect();
		$users = [];

    	$req = $this->$db->query('SELECT id, pseudo, email, pass, access FROM user ORDER BY pseudo AND access');

	    while ($data = $req->fetch())
	    {
	      	$users[] = new User($data);
	    }

    	return $users;
	}

	public function updateUser(User $user)
	{

	}

}