<?php

require_once("model/Database.php");

class Post extends Database
{
	public function getPosts()
    {
        $db = $this->db_connect();

        $req = $db->query("SELECT id, title, SUBSTR(content, 1, 200), DATE_FORMAT(post_date, '%W, %d %M %Y') AS date_post FROM post ORDER BY post_date DESC LIMIT 0, 5");

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->db_connect();

        $req = $db->prepare("SELECT id, title, content, DATE_FORMAT(post_date, '%W, %d %M %Y') AS creation_date_fr FROM post WHERE id = ?");
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }


    // Méthode pour obtenir le nombre de commentaires pour chaque post
    // public function getNbrComments($postId)
    // {
    //  	$db = $this->db_connect();

    // 	$request = $db->prepare("SELECT COUNT(*) FROM comment WHERE id_post = ?");
    // 	$request->execute(array($postId));
    // 	$nbrComment = $req->fetch();

    //  	return $nbrComment;
    // }


}