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
  }

  public function deleteComment($commentId)
  {
    $db = $this->db_connect();

    $req = $db->prepare('DELETE FROM comment WHERE id = ?');

    $req->execute(array($commentId));
  }

  public function editComment(Comment $comment)
  {
    $db = $this->db_connect();

    $req = $db->prepare("
      UPDATE comment 
      SET content = :content, report = :report
      WHERE id = :id
    ");

    $req->execute(array(
      'id'      => $comment->id(),
      'content' => $comment->content(),
      'report'  => $comment->report()
    ));
  }

  public function getComment($commentId)
  {
    $db = $this->db_connect();

    $req = $db->prepare("
      SELECT c.id AS commentId, p.id AS postId, u.pseudo, p.title, SUBSTR(c.content, 1, 200), c.content AS commentContent, DATE_FORMAT(c.comment_date, '%d/%m/%Y à %Hh%i') AS comment_date, c.report
      FROM comment c
      INNER JOIN post p ON c.post_id = p.id
      INNER JOIN user u ON c.user_id = u.id
      WHERE c.id = ?
    ");

    $req->execute(array($commentId));
    $comment = $req->fetch();
    $req->closeCursor();

    return $comment;
  }
    

	public function getComments($postId)
	{
		$db = $this->db_connect();

   		$comments = $db->prepare("
   			SELECT c.id, u.pseudo, c.content, DATE_FORMAT(c.comment_date, '%d %M %Y à %Hh%i') AS comment_date_fr 
   			FROM comment c
   			INNER JOIN user u ON u.id = c.user_id
   			WHERE post_id = ? 
   			ORDER BY comment_date DESC");

    	$comments->execute(array($postId));

    	return $comments;
	}

  public function getCommentsByReport()
  {
    $db = $this->db_connect();

    $comments = $db->query("
      SELECT c.id AS commentId, p.id AS postId, u.pseudo, p.title, SUBSTR(c.content, 1, 200), DATE_FORMAT(c.comment_date, '%d/%m/%Y à %Hh%i') AS comment_date, report
      FROM comment c
      INNER JOIN post p ON c.post_id = p.id
      INNER JOIN user u ON c.user_id = u.id
      ORDER BY report DESC, comment_date DESC");

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