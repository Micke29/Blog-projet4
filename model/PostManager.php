<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title FROM t_posts_pst NATURAL JOIN t_picture_pic GROUP BY pst_id ORDER BY pst_id ASC');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title FROM t_posts_pst NATURAL JOIN t_picture_pic WHERE pst_id = ? GROUP BY pst_id');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function theExcerpt($string) { return substr($string, 0, 300).'...'; }

	public function addPost($pictureManager, $title, $content)
	{
		$result = false;

		if($upload = $pictureManager->addPicturePost($title))
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT pic_id FROM t_picture_pic WHERE pic_title = ?');
			$req->execute(array($title));
			$id = $req->fetch();

			$pictureId = $id['pic_id'];

			$req = $db->prepare('INSERT INTO t_posts_pst(pst_title, pst_content, pst_date, pic_id) VALUES(?, ?, NOW(), ?)');
			$req->execute(array($title, $content, $pictureId));

			$result = true;
		}

		return $result;
	}
}