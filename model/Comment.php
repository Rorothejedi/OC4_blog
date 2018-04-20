<?php

class Comment extends Database
{
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