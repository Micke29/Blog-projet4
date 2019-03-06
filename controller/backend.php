<?php

require_once('model/AdminManager.php');
require_once('model/CommentManager.php');

function login()
{
	$adminManager = new \OpenClassrooms\Blog\Model\AdminManager();

	$affectedLines = $adminManager->loginAdmin($_POST['username'], $_POST['password']);

	if($affectedLines['act_count'] == 1) 
	{
		$_SESSION['admin'] = true;
		header("Location: index.php?action=admin&part=preview");
	}
	else throw new Exception('Connexion impossible !');
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