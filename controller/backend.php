<?php

require_once('model/AdminManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function login()
{
	$adminManager = new \OpenClassrooms\Blog\Model\AdminManager();

	$affectedLines = $adminManager->loginAdmin($_POST['username'], $_POST['password']);

	if($affectedLines['act_count'] == 1) 
	{
		$_SESSION['admin'] = true;
		header("Location: index.php?action=admin");
	}
	else
	{
		$_SESSION['badConnection'] = true;
		header("Location: index.php");
	}
}

function logout()
{
	$adminManager = new \OpenClassrooms\Blog\Model\AdminManager();

	$adminManager->logoutAdmin();

	header("Location: index.php");
}

function preview()
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comments = $commentManager->getCountReportComments();

	require('view/backend/preview.php');
}

function addArticle($title, $content)
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();

	$add = $postManager->addPicturePost($title);

	if($add)
	{
		$_SESSION['add'] = true;
		header("Location: index.php?action=admin&part=preview");
	}
	else
	{
		$_SESSION['file'] = $add; // Récupération du code erreur pour comprendre le problème, ne renvoi rien
		header("Location: index.php?action=admin&part=addArticle");
	}
}