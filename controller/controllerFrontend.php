<?php 

session_start();

// Chargement des classes
require_once('./model/Post.php');
require_once('./model/PostManager.php');
require_once('./model/Comment.php');
require_once('./model/CommentManager.php');
require_once('./model/User.php');
require_once('./model/UserManager.php');


// Chargement des fonctions de contrôle
// 
// -----------------  Display Pages  ---------------------
function home()
{
	require('./view/frontend/viewHome.php');
}
// Connexion
function displayConnection()
{
	require('./view/frontend/viewConnection.php');
}
// Inscription
function displayRegistration()
{
	require ('./view/frontend/viewRegistration.php');
}

function displayConfirmRegistration()
{
	$_SESSION['pseudo'] = null;
	$_SESSION['email'] = null;
	require ('./view/frontend/viewConfirmRegistration.php');
}


// -----------------  Alerts  ---------------------

function alertSuccess($message)
{
	$_SESSION['alertSuccess'] = $message;
}
function alertFailure($message, $page)
{
	$_SESSION['alertFailure'] = $message;
	header('Location: index.php?p=' . $page);
}


// -----------------  Users  ---------------------

function registrationUser($pseudo, $pass, $email)
{
	$newUser = new User([
		'pseudo' => $pseudo, 
		'pass' => $pass, 
		'email' => $email
	]);

	$userManager = new UserManager();
	$userManager->addUser($newUser);

	$_SESSION['userName'] = $pseudo;
	$_SESSION['newUserRegister'] = true;
	header('Location: index.php?p=confirmRegister');
}

function connection($pseudo)
{
	$userManager = new UserManager();
	$connectData = $userManager->getUser($pseudo);

	if ($connectData === false) 
	{
        throw new Exception('Ce nom d\'utilisateur n\'existe pas');
    } 
    else 
    {
    	header('Location: index.php?p=login');
    }
	return $connectData;
}
function connectAdmin($pseudo)
{
	$_SESSION['access'] = 1;
	$_SESSION['userName'] = $pseudo;
	header('Location: index.php?p=adminPosts');
}
function connectUser($pseudo)
{
	$_SESSION['access'] = 2;
	$_SESSION['userName'] = $pseudo;
	header('Location: index.php');
}
function logout()
{
	header('Location: index.php');
	session_destroy();
}

// -----------------  Posts  ---------------------

function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	$nbrComments = $postManager->getNbrCommentsByPost();

	require('./view/frontend/viewListPosts.php');
}

function displayPost()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	
	require('./view/frontend/viewPost.php');
}

// -----------------  Comments  ---------------------

function reportComment($commentId)
{
	$commentManager = new CommentManager();
	$commentManager->reportComment($commentId);

    header('Location: index.php?p=post&id=' . $_GET['id'] . '#comments');
}

function newComment($postId, $pseudo, $content)
{
	$userManager = new UserManager();
	$userId = $userManager->getUser($pseudo);

	$newComment = new Comment([
		'post_id' => $postId,
		'user_id' => $userId->id(),
		'content' => $content
	]);

	$commentManager = new CommentManager();
	$commentManager->addComment($newComment);

	header('Location: index.php?p=post&id=' . $_GET['id'] . '#comments');
}	


// ---------------------------  ADMIN  --------------------------------


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
function showComment()
{

}
function editComment()
{

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