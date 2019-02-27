<?php
require('controller/frontend.php');

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPosts') listPosts();
	}
	else listPosts();
}
catch (PDOException $e)
{
	echo 'La connexion a échoué.<br>';
	echo 'Informations : [', $e->getCode(), '] ', $e->getMessage();
}
catch(Exception $e)
{
	echo '[Exception] : ', $e->getMessage();
}