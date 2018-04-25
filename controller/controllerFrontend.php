<?php 

session_start();

// Chargement des classes
require_once('./model/Post.php');
require_once('./model/Comment.php');
require_once('./model/User.php');
require_once('./model/UserManager.php');


// Chargement des fonctions de contrôle

// Accueil
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

// Enregistrement d'un nouvel utilisateur
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


// Alertes
function alertSuccess($message)
{
	$_SESSION['alertSuccess'] = $message;
}
function alertFailure($message, $page)
{
	$_SESSION['alertFailure'] = $message;
	header('Location: index.php?p=' . $page);
}




// Connexion
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
	$_SESSION['access']   = 1;
	$_SESSION['userName'] = $pseudo;
	header('Location: index.php?p=manageComment');
}
function connectUser($pseudo)
{
	$_SESSION['access']   = 2;
	$_SESSION['userName'] = $pseudo;
	header('Location: index.php');
}

// Déconnexion
function logout()
{
	header('Location: index.php');
	session_destroy();
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


