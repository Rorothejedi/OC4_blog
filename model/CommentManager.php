<?php

require_once("model/Database.php");

class CommentManager extends Database
{

	public function addComment(Comment $comment)
    {
        $db = $this->db_connect();

        $req = $db->prepare("
            INSERT INTO comment (post_id, user_id, content, comment_date) 
            VALUES (:post_id, :user_id, :content, NOW())");

        $req->execute(array(
            'post_id' => $comment->post_id(),
            'user_id' => $comment->user_id(),
        	  'content' => $comment->content()
        ));

        $req->closeCursor();
    }

    public function deleteComment(Comment $comment)
    {
        $db = $this->db_connect();

        $this->$db->exec('DELETE FROM comment WHERE id = ' . $comment->id());
    }

    public function updatePost(Post $post)
    {

    }

    

	public function getComments($postId)
	{
		$db = $this->db_connect();

   		$comments = $db->prepare("
   			SELECT c.id, u.pseudo, c.content, DATE_FORMAT(c.comment_date, '%d %M %Y à %Hh%i') AS comment_date_fr 
   			FROM comment c
   			INNER JOIN user u
   			ON u.id = c.user_id
   			WHERE post_id = ? 
   			ORDER BY comment_date DESC");
    	$comments->execute(array($postId));

    	return $comments;
	}

	public function reportComment($commentId)
	{
		$db = $this->db_connect();

		$comments = $db->prepare("
			UPDATE comment SET report = report + 1 WHERE id = ?");
		$comments->execute(array($commentId));

		return $comments;
	}

}