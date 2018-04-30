<?php 

if(session_id() == "") session_start();


// Chargement des classes
require_once('./model/Post.php');
require_once('./model/PostManager.php');
require_once('./model/Comment.php');
require_once('./model/CommentManager.php');
require_once('./model/User.php');
require_once('./model/UserManager.php');


// Chargement des fonctions de contrôle

// ---------------  Posts  --------------------


function adminPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('./view/backend/viewAdminPosts.php');
}

function newPost()
{
	require('./view/backend/viewNewPost.php');
}
function processNewPost($title, $content)
{
	$newPost = new Post([
		'title' => $title,
		'content' => $content
	]);

	$postManager = new PostManager();
	$postManager->addPost($newPost);
	header('Location: index.php?p=adminPosts');
}

function editPost()
{
	$postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);

	require('./view/backend/viewEditPost.php');
}
function processEditPost($postId, $title, $content) 
{
	$newPost = new Post([
		'id' => $postId,
		'title' => $title,
		'content' => $content
	]);

	$postManager = new PostManager();
	$postManager->editPost($newPost);
	header('Location: index.php?p=adminPosts');
}

function deletePost($postId)
{
	$postManager = new PostManager();
	$deleteTransaction = $postManager->deletePost($postId);

	if ($deleteTransaction === true) 
	{
		header('Location: index.php?p=adminPosts');
	} 
	else 
	{
		throw new Exception('Oups ! Un problème est survenu...');
	}

}


// ---------------  Comments  -------------------



function adminComments()
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getCommentsByReport();

	require('./view/backend/viewAdminComments.php');
}
function editComment()
{
	$commentManager = new CommentManager();
	$comment = $commentManager->getComment($_GET['commentId']);

	require('./view/backend/viewEditComment.php');
}
function processEditComment($commentId, $content, $report)
{
	$newComment = new Comment([
		'id' => $commentId,
		'content' => $content,
		'report' => $report
	]);

	$commentManager = new CommentManager();
	$commentManager->editComment($newComment);
	header('Location: index.php?p=adminComments');
}
function deleteComment($commentId)
{
	$commentManager = new CommentManager();
	$commentManager->deleteComment($commentId);

	header('Location: index.php?p=adminComments');
}


// ---------------  Users  -------------------


function adminUsers()
{
	$userManager = new UserManager();
	$users = $userManager->getUsers();

	require('./view/backend/viewAdminUsers.php');
}
function newAdminUser()
{
	
}
function editUser()
{

}
function deleteUser($userId)
{
	$userManager = new UserManager();
	$deleteTransaction = $userManager->deleteUser($userId);

	if ($deleteTransaction === true)
	{
		header('Location: index.php?p=adminUsers');
	}
	else 
	{
		throw new Exception('Oups ! Un problème est survenu...');
	}
}