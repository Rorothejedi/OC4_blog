<?php 

class Database
{

	protected function db_connect()
    {
    	if ($this->db === null) 
    	{
    		$db = new \PDO('mysql:host=localhost;dbname=activite_mvc;charset=utf8', 'root', '');

    		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    		$this->db = $db;
    	}
        
        return $this->db;
    }
}