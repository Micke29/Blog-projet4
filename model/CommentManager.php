<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT cmt_id, cmt_author, cmt_content, DATE_FORMAT(cmt_date, \'%d/%m/%Y à %Hh%imin\') AS cmt_date_fr FROM t_comments_cmt WHERE pst_id = ? ORDER BY cmt_date ASC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('INSERT INTO t_comments_cmt(cmt_author, cmt_content, cmt_date, pst_id) VALUES(?, ?, NOW(), ?)');
		$affectedLine = $comment->execute(array($author, $comment, $postId));

		return $affectedLine;
	}
}