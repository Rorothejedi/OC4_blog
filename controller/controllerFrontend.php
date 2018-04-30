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


function registrationUser($pseudo, $pass, $email, $access)
{
	$newUser = new User([
		'pseudo' => $pseudo, 
		'pass'   => $pass, 
		'email'  => $email,
		'access' => $access
	]);

	$userManager = new UserManager();
	$userManager->addUser($newUser);

	if ($access == 1) 
	{
		header('Location: index.php?p=adminUsers');
	}
	else
	{
		$_SESSION['userName'] = $pseudo;
		$_SESSION['newUserRegister'] = true;
		header('Location: index.php?p=confirmRegister');
	}
	
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


// ---------------  Settings  -------------------


function userSettings($pseudo)
{
	$userManager = new UserManager();
	$user = $userManager->getUser($pseudo);

	require('./view/frontend/viewUserSettings.php');
}
function processEditUserSettings($id, $pseudo, $email, $pass)
{
	$newUser = new User([
		'id'     => $id,
		'pseudo' => $pseudo,
		'pass'   => $pass,
		'email'  => $email
	]);

	$userManager = new UserManager();
	$userManager->editUser($newUser);
	header('Location: index.php?p=userSettings');
	$_SESSION['userName'] = $pseudo;
}