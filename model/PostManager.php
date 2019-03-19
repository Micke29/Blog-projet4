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

	public function postPost($title, $content, $pictureId)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO t_posts_pst(pst_title, pst_content, pst_date, pic_id) VALUES(?, ?, NOW(), ?)');
		$affectedLine = $post->execute(array($title, $content, $pictureId));
		
		return $affectedLine;
	}

	public function updatePost($postId, $title, $content, $pictureId)
	{
		$db = $this->dbConnect();
		$post = $db->prepare('UPDATE t_posts_pst SET pst_title = ?, pst_content = ?, pst_date = NOW(), pic_id = ? WHERE pst_id = ?');
		$affectedLine = $post->execute(array($title, $content, $pictureId, $postId));

		return $affectedLine;
	}

	public function theExcerpt($string) { return substr($string, 0, 300).'...'; }

	public function addPost($pictureManager, $title, $content)
	{
		$result = false;

		if($_FILES['picture']['error'] != UPLOAD_ERR_NO_FILE)
		{
			if($upload = $pictureManager->addPicturePost($title))
			{
				$db = $this->dbConnect();
				$req = $db->prepare('SELECT pic_id FROM t_picture_pic WHERE pic_title = ?');
				$req->execute(array($title));
				$id = $req->fetch();

				$pictureId = $id['pic_id'];

				$affectedLine = $this->postPost($title, $content, $pictureId);
				if($affectedLine !== false) $result = true;
			}
		}
		else
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT pic_id FROM t_picture_pic WHERE pic_title = "Default"');
			$req->execute();
			$id = $req->fetch();

			$pictureId = $id['pic_id'];

			$affectedLine = $this->postPost($title, $content, $pictureId);
			if($affectedLine !== false) $result = true;
		}

		return $result;
	}

	public function editPost($pictureManager, $postId, $title, $content)
	{
		$result = false;

		if($_FILES['picture']['error'] != UPLOAD_ERR_NO_FILE)
		{
			if($upload = $pictureManager->updatePicturePost($postId, $title))
			{
				$db = $this->dbConnect();
				$req = $db->prepare('SELECT pic_id FROM t_posts_pst WHERE pst_id = ?');
				$req->execute(array($postId));
				$id = $req->fetch();

				$pictureId = $id['pic_id'];

				$affectedLine = $this->updatePost($postId, $title, $content, $pictureId);
				if($affectedLine !== false) $result = true;
			}
		}
		else
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT pic_id FROM t_posts_pst WHERE pst_id = ?');
			$req->execute(array($postId));
			$id = $req->fetch();

			$pictureId = $id['pic_id'];

			$affectedLine = $this->updatePost($postId, $title, $content, $pictureId);
			if($affectedLine !== false) $result = true;
		}

		return $result;
	}
}