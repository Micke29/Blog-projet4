<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
	$postManager = new \OpenClassrooms\Blog\Model\PostManager();
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$posts = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}