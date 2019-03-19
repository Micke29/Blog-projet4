<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PictureManager extends Manager
{
	public function addPicturePost($title)
	{
		$result = false;

		if($_FILES['picture']['error'] == UPLOAD_ERR_OK)
		{
			if($_FILES['picture']['size'] <= 1000000)
			{
				$valid_extension = array('jpg', 'jpeg', 'gif', 'png');

				$upload_extension = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));
				if(in_array($upload_extension,$valid_extension))
				{
					$picture_sizes = getimagesize($_FILES['picture']['tmp_name']);
					if($picture_sizes[0] > 200 && $picture_sizes[1] > 150)
					{
						$name = uniqid(rand(), true) . "." . $upload_extension;
						$link = "public/images/" . $name;
		
						if($result = move_uploaded_file($_FILES['picture']['tmp_name'], $link))
						{
							$db = $this->dbConnect();
							$req = $db->prepare('INSERT INTO t_picture_pic(pic_link, pic_title) VALUES(?, ?)');
							$req->execute(array($name, $title));
						}
					}
				}
			}
		}
		
		return $result;
	}

	public function updatePicturePost($postId, $title)
	{
		$result = false;

		if($upload = $this->addPicturePost($title))
		{
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT pic_id FROM t_post_pst WHERE pst_id = ?');
			$req->execute(array($postId));
			$id = $req->fetch();

			$oldPictureId = $id['pic_id'];

			$req = $db->prepare('SELECT pic_id FROM t_picture_pic WHERE pic_title = ?');
			$req->execute(array($postId));
			$id = $req->fetch();

			$newPictureId = $id['pic_id'];

			$req = $db->prepare('UPDATE t_post_pst SET pic_id = ? WHERE pst_id = ?');
			$req->execute(array($newPictureId, $postId));

			$this->deletePicturePost($oldPictureId);

			$result = true;
		}

		return $result;
	}

	public function deletePicturePost($id)
	{
		$req = $db->prepare('DELETE FROM t_picture_pic WHERE pic_id = ?');
		$req->execute(array($id));
	}
}