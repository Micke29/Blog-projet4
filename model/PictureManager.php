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
}