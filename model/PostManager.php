<?php

require_once("model/Database.php");

class PostManager extends Database
{

    public function addPost(Post $post)
    {
        $db = $this->db_connect();

        $req = $db->prepare("
            INSERT INTO post (title, content, post_date) 
            VALUES (:title, :content, NOW())");

        $req->execute(array(
            'title' => $post->title(),
            'content' => $post->content()));

        $req->closeCursor();
    }

    public function deletePost(Post $post)
    {
        $db = $this->db_connect();

        $this->$db->exec('DELETE FROM post WHERE id = ' . $post->id());
    }

	public function getPosts()
    {
        $db = $this->db_connect();

        $req = $db->query("
            SELECT id, title, SUBSTR(content, 1, 200), DATE_FORMAT(post_date, '%W, %d %M %Y') AS date_post 
            FROM post 
            ORDER BY post_date DESC 
            LIMIT 0, 5");

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->db_connect();

        $req = $db->prepare("
            SELECT id, title, content, DATE_FORMAT(post_date, '%W, %d %M %Y') AS creation_date_fr 
            FROM post 
            WHERE id = ?");
        
        $req->execute(array($postId));
        $post = $req->fetch();
        $req->closeCursor();

        return $post;
    }

    public function updatePost(Post $post)
    {

    }

    // Méthode pour obtenir le nombre de commentaires pour chaque post
    public function getNbrCommentsByPost()
    {
     	$db = $this->db_connect();

    	$req = $db->query("
            SELECT COUNT(c.id) 
            FROM comment c
            RIGHT JOIN post p 
            ON c.post_id = p.id
            GROUP BY c.post_id
            ORDER BY p.post_date DESC 
        ");

     	return $req;
    }


}