<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title, COUNT(cmt_id) AS cmt_number FROM t_posts_pst NATURAL JOIN t_picture_pic NATURAL JOIN t_comments_cmt GROUP BY pst_id ORDER BY pst_id ASC');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pst_id, pst_title, pst_content, DATE_FORMAT(pst_date, \'%d/%m/%Y à %Hh%imin\') AS pst_date_fr, pic_link, pic_title, COUNT(cmt_id) AS cmt_number FROM t_posts_pst NATURAL JOIN t_picture_pic NATURAL JOIN t_comments_cmt WHERE pst_id = ? GROUP BY pst_id');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function theExcerpt($string) { return substr($string, 0, 300).'...'; }

	public function addPicturePost($title)
	{
		$result = false;

		if($_FILES['picture']['error'] < 0)
		{
			$result = 1;
			if($_FILES['picture']['size'] <= 80000)
			{
				$result = 2;
				$valid_extension = array('jpg', 'jpeg', 'gif', 'png');

				$upload_extension = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));
				if(in_array($upload_extension,$valid_extension))
				{
					$result = 3;
					$picture_size = getimagesize($_FILES['picture']['tmp_name']);
					if($image_sizes[0] == 700 && $image_sizes[1] == 220)
					{
						$result = 4;
						$name = uniqid(rand(), true);
						$link = "public/images/" . $name . "." . $upload_extension;

						$result = move_uploaded_file($_FILES['picture']['tmp_name'], $link);
						if($result)
						{
							$db = $this->dbConnect();
							$req = $db->prepare('INSERT INTO t_picture_pic(pic_link, pic_title) VALUES(?, ?)');
							$req->execute(array($name, $title));
						}
						$result = 5;
					}
				}
			}
		}
		
		return $result;
	}

	public function addPost($title, $content)
	{
		$result = false;
		$upload = $this->addPicturePost($title);

		if($upload)
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT pic_id FROM t_picture_pic WHERE pic_title = ?');
			$req->execute(array($title));
			$pictureId = $req->fetch();

			$req = $db->prepare('INSERT INTO t_posts_pst(pst_title, pst_content, pst_date, pic_id) VALUES(?, ?, NOW(), ?)');
			$req->execute(array($title, $content, $pictureId));

			$result = true;
		}

		return $result;
	}
}