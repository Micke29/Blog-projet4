<?php
require('controller/frontend.php');

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPosts') listPosts();
		elseif($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0) post();
			else throw new Exception('Aucun identifiant de billet envoyé');
		}
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