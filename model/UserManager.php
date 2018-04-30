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
			'access' => $user->access()
		));
	}

	public function deleteUser($userId)
    {
        $db = $this->db_connect();

        try 
        {
            $db->beginTransaction();

            $req = $db->query('SELECT COUNT(*) FROM comment WHERE user_id = "' . $userId . '"');

            if ($req->fetchColumn() > 0)
            {
                $req = $db->prepare('DELETE user, comment FROM user, comment WHERE user.id = ?'); 
            }
            else
            {
                $req = $db->prepare('DELETE FROM user WHERE id = ?'); 
            }

            $req->execute(array($userId));
            $db->commit();

            return true;
        } 
        catch (Exception $e) 
        {
            $db->rollback();
        } 
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

	public function editUser(User $user)
	{
		$db = $this->db_connect();

		$req = $db->prepare('
			UPDATE user 
			SET pseudo = :pseudo, email = :email, pass = :pass 
			WHERE id = :id
		');

		$req->execute(array(
			'id'     => $user->id(),
			'pseudo' => $user->pseudo(),
			'email'  => $user->email(),
			'pass'   => $user->pass()
		));
	}
}