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
		elseif($_GET['action'] == 'addComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				if(!empty($_POST['author']) && !empty($_POST['comment'])) addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				else throw new Exception('Tous les champs ne sont pas remplis !');
			}
			else throw new Exception('Aucun identifiant de billet envoyé');
		}
		elseif($_GET['action'] == 'report')
		{
			if(isset($_GET['id']) && isset($_GET['commentId']) && $_GET['id'] > 0 && $_GET['commentId'] > 0) report($_GET['id']);
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