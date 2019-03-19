<?php

require_once('model/AdminManager.php');
require_once('model/CommentManager.php');
require_once('model/PictureManager.php');
require_once('model/PostManager.php');

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

function listArticles()
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();

	$posts = $postManager->getPosts();

	require('view/backend/listArticlesView.php');
}

function showEditArticle($id)
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();

	$post = $postManager->getPost($id);

	require('view/backend/articleView.php');
}

function addArticle($title, $content)
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();
	$pictureManager = new \OpenClassrooms\Blog\Model\PictureManager();

	$add = $postManager->addPost($pictureManager, $title, $content);

	if($add)
	{
		$_SESSION['good'] = 'ajouté';
		header("Location: index.php?action=admin&part=preview");
	}
	else
	{
		$_SESSION['file'] = true;
		header("Location: index.php?action=admin&part=addArticle");
	}
}

function editArticle($title, $content, $id)
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();
	$pictureManager = new \OpenClassrooms\Blog\Model\PictureManager();

	$update = $postManager->editPost($pictureManager, $id, $title, $content);

	if($update)
	{
		$_SESSION['good'] = 'modifié';
		header("Location: index.php?action=admin&part=preview");
	}
	else
	{
		$_SESSION['error'] = true;
		header("Location: index.php?action=admin&part=editArticle");
	}
}

function moderateComments()
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$reportComments = $commentManager->getReportComments();

	require('view/backend/listCommentsModerateView.php');
}