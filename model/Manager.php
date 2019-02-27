<?php
namespace OpenClassrooms\Blog\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'Gw23253119Fr');
		return $db;
	}
}