<?php

require_once('model/CommentManager.php');
require_once('model/PostManager.php');

function listPosts()
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	if (trim($author) == '' || trim($comment) == '') throw new UserException('Impossible d\'ajouter le commentaire !');
	

	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if($affectedLines === false) throw new UserException('Impossible d\'ajouter le commentaire !');
	else header('Location: ./?action=post&id=' . $postId);
}

function report($postId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$affectedLines = $commentManager->reportComment($_GET['commentId']);

	if($affectedLines === false) throw new UserException('Une erreur est survenue !');
	else
	{
		$_SESSION['report'] = true;
		header('Location: ./?action=post&id=' . $postId . '#commentArea');
	}
}