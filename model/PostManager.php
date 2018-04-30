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

    public function deletePost($postId)
    {
        $db = $this->db_connect();

        try 
        {
            $db->beginTransaction();

            $req = $db->query('SELECT COUNT(*) FROM comment WHERE post_id = "' . $postId . '"');

            if ($req->fetchColumn() > 0) 
            {
                $db->query('DELETE post, comment FROM post, comment WHERE post.id = "' . $postId . '"'); 
            }
            else
            {
                $db->query('DELETE FROM post WHERE id = "' . $postId . '"'); 
            }

            $db->commit();   

            return true;
        } 
        catch (Exception $e) 
        {
            $db->rollback();
        } 
    }

	public function getPosts()
    {
        $db = $this->db_connect();

        $req = $db->query("
            SELECT id, title, SUBSTR(content, 1, 200), DATE_FORMAT(post_date, '%W, %d %M %Y') AS date_post, DATE_FORMAT(post_date, '%d/%m/%Y') AS mini_date_post 
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
            WHERE id = ?
        ");
        
        $req->execute(array($postId));
        $post = $req->fetch();
        $req->closeCursor();

        return $post;
    }

    public function editPost(Post $post)
    {
        $db = $this->db_connect();

        $req = $db->prepare("
           UPDATE post 
           SET title = :title, content = :content 
           WHERE id = :id
        ");

        $req->execute(array(
            'id' => $post->id(),
            'title' => $post->title(),
            'content' => $post->content()
        ));
    }

    // Méthode pour obtenir le nombre de commentaires pour chaque post
    public function getNbrCommentsByPost()
    {
     	$db = $this->db_connect();

    	$req = $db->query("
            SELECT COUNT(c.id) 
            FROM post p
            LEFT JOIN comment c ON p.id = c.post_id
            GROUP BY p.id
            ORDER BY p.post_date DESC 
        ");

     	return $req;
    }


}