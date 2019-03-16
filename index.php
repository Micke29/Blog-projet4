<?php
session_start();

require('controller/backend.php');
require('controller/frontend.php');

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPosts') listPosts();
		elseif($_GET['action'] == 'post')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0) post();
			else throw new UserException('Aucun identifiant de billet envoyé');
		}
		elseif($_GET['action'] == 'addComment')
		{
			if(isset($_GET['id']) && $_GET['id'] > 0)
			{
				if(!empty($_POST['author']) && !empty($_POST['comment'])) addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
				else throw new UserException('Tous les champs ne sont pas remplis !');
			}
			else throw new UserException('Aucun identifiant de billet envoyé');
		}
		elseif($_GET['action'] == 'report')
		{
			if(isset($_GET['id']) && isset($_GET['commentId']) && $_GET['id'] > 0 && $_GET['commentId'] > 0) report($_GET['id']);
			else throw new UserException('Aucun identifiant de billet envoyé');
		}
		elseif($_GET['action'] == 'login')
		{
			if(!empty($_POST['username']) && !empty($_POST['password'])) login();
			else throw new AdminException('Tous les champs ne sont pas remplis !');
		}
		elseif($_GET['action'] == 'logout')
		{
			if(isset($_SESSION['admin'])) logout();
			else throw new AdminException('Erreur de traitement !');
		}
		elseif($_GET['action'] == 'admin')
		{
			if(isset($_SESSION['admin']))
			{
				if(isset($_GET['part']))
				{
					if($_GET['part'] == 'preview') preview();
					elseif($_GET['part'] == 'addArticle')
					{
						if(isset($_FILES['picture']) && !empty($_POST['title']) && !empty($_POST['content'])) addArticle($_POST['title'], $_POST['content']);
						else require('view/backend/addArticleView.php');
					}
					elseif($_GET['part'] == 'moderate') moderateComments();
					else throw new AdminException('Erreur de redirection');
				}
				else preview();
			}
			else header("Location: index.php");
		}
		else throw new UserException('Erreur de redirection');
	}
	else listPosts();
}
catch (PDOException $e)
{
	echo 'La connexion a échoué.<br>';
	echo 'Informations : [', $e->getCode(), '] ', $e->getMessage();
}
catch(UserException $e)
{
	echo '[Exception] : ', $e->getMessage();
}
catch(AdminException $e)
{
	echo '[Exception] : ', $e->getMessage();
}