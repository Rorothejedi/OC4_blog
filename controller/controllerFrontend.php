<?php 

// Chargement des classes
require_once('./model/Post.php');
require_once('./model/Comment.php');


// Chargement des fonctions de contrôle
function home()
{
	require('./view/frontend/viewHome.php');
}

function displayRegistration()
{
	require ('./view/frontend/viewRegistration.php');
}

function displayConnection()
{
	require('./view/frontend/viewConnection.php');
}


function listPosts()
{
	$listPostsManager = new Post();
	$posts = $listPostsManager->getPosts();
	// $nbrComments = $listPostsManager->getNbrComments();

	require('./view/frontend/viewListPosts.php');
}

function displayPost()
{
	$postManager = new Post();
	$commentManager = new Comment();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	
	require('./view/frontend/viewPost.php');
}

function reportComment($commentId)
{
	$commentManager = new Comment();

	$comment_designed = $commentManager->reportComment($commentId);

	if ($comment_designed === false) 
	{
        throw new Exception('Impossible de signaler le commentaire !');
    } 
    else 
    {
    	header('Location: index.php?p=post&id=' . $_GET['id']);
    }
}


