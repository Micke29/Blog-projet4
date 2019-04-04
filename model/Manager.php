<?php
namespace OpenClassrooms\Blog\Model;

class Manager
{
	private static $_instance;

	protected function dbConnect()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
		}
		return self::$_instance;
	}
}