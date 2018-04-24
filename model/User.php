<?php

require_once("model/Database.php");

class User extends Database
{
	public function registerUser($pseudo, $pass, $email)
	{
		try 
		{
			$db = $this->db_connect();

			$req = $db->prepare("
				INSERT INTO user (pseudo, pass, email, access) 
				VALUES (:pseudo, :pass, :email, :access)");

			$req->execute(array(
				'pseudo' => $pseudo,
				'pass' => $pass,
				'email' => $email,
				'access' => 2));

			$req->closeCursor();
		}
		catch(PDOException $e)
		{
    		echo "Échec : " . $e->getMessage();
		}
	}

	public function checkUserInfos($pseudo, $email)
	{
		$db = $this->db_connect();

		$req = $db->prepare("
			SELECT COUNT(*) 
			FROM user 
			WHERE pseudo = ? OR email = ?");

		$req->execute(array($pseudo, $email));

		$countUserInfos = $req->rowCount();

		$req->closeCursor(); // A test

		return $countUserInfos;
	}

	public function connectUser($pseudo)
	{
		$db = $this->db_connect();

		$req = $db->prepare("
			SELECT pseudo, email, pass, access 
			FROM user 
			WHERE pseudo = ?");

		$req->execute(array($pseudo));
		$resultPseudo = $req->fetch();
		$req->closeCursor();

		return $resultPseudo;
	}

}