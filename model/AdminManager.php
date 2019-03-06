<?php
namespace OpenClassrooms\Blog\Model;

require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function loginAdmin($username, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT COUNT(*) AS act_count FROM t_account_act WHERE act_username = ? AND act_password = ?');
		$req->execute(array($username, crypt($password, '$2y$10$z.miPUi3A0TavSvDnTPSp.2pXfjYA08Kz3Cwij/1EDhOgieeZQf6u')));
		$affectedLine = $req->fetch();

		return $affectedLine;
	}

	public function logoutAdmin()
	{
		$_SESSION = array();
		session_destroy();
	}
}