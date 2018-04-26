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
			'pass'   => $user->pass(),
			'email'  => $user->email(),
			'access' => 2));

		$req->closeCursor();
		
	}

	public function deleteUser($userId)
	{
		$db = $this->db_connect();

		$req = $db->prepare('
			DELETE user, comment FROM user, comment 
			WHERE user.id = ? AND comment.user_id = ?
		');
		$req->execute(array($userId, $userId));
		$req->closeCursor();
	}

	public function getUser($pseudo)
	{
		$db = $this->db_connect();

		$req = $db->query('
			SELECT id, pseudo, email, pass, access 
			FROM user 
			WHERE pseudo = "' . $pseudo . '"');
		
		$data = $req->fetch();
		
		return new User($data);
	}

	public function getUsers()
	{
		$db = $this->db_connect();

    	$users = $db->query('
			SELECT id, pseudo, email, access 
			FROM user 
			ORDER BY access, pseudo');

    	return $users;
	}

	public function updateUser(User $user)
	{

	}

}