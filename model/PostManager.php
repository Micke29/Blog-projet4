<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title FROM t_posts_pst NATURAL JOIN t_picture_pic ORDER BY pst_id ASC');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title FROM t_posts_pst NATURAL JOIN t_picture_pic WHERE pst_id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}
}