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

	public function getCountComments($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(*) AS cmt_number FROM t_comments_cmt WHERE pst_id = ?');
		$req->execute(array($postId));
		$comments = $req->fetch();

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO t_comments_cmt(cmt_author, cmt_content, cmt_date, pst_id) VALUES(?, ?, NOW(), ?)');
		$affectedLine = $comments->execute(array($author, $comment, $postId));

		return $affectedLine;
	}

	public function deleteComments($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM t_comments_cmt WHERE pst_id = ?');
		$req->execute(array($postId));
	}

	public function reportComment($commentId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE t_comments_cmt SET cmt_report = 1 WHERE cmt_id = ?');
		$affectedLine = $comments->execute(array($commentId));

		return $affectedLine;
	}

	public function getCountReportComments()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT COUNT(cmt_id) AS cmt_report_total FROM t_comments_cmt WHERE cmt_report = 1');
		$comments = $req->fetch();

		return $comments;
	}

	public function getReportComments()
	{
		$db = $this->dbConnect();
		$comments = $db->query('SELECT cmt_id, cmt_author, cmt_content FROM t_comments_cmt WHERE cmt_report = 1');

		return $comments;
	}
}