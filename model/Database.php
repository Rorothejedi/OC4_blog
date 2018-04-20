<?php 

class Database
{

	protected function db_connect()
    {
    
    	$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("SET lc_time_names = 'fr_FR'");

    	return $db;
    }
}