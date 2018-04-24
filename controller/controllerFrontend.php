<?php 

session_start();

// Chargement des classes
require_once('./model/Post.php');
require_once('./model/Comment.php');
require_once('./model/User.php');


// Chargement des fonctions de contrôle
function home()
{
	require('./view/frontend/viewHome.php');
}

// Inscription
function displayRegistration()
{
	require ('./view/frontend/viewRegistration.php');
}
// Enregistrment d'un nouvel utilisateur
function registrationUser($pseudo, $pass, $email)
{
	$userManager = new User();
	$create_user = $userManager->registerUser($pseudo, $pass, $email);

	if ($create_user === false) 
	{
        throw new Exception('Impossible de créer un nouvel utilisateur !');
    } 
    else 
    {
    	//Ajouter une confirmation de l'inscription
    	header('Location: index.php?p=confirmationRegister');
    }
}
// Check de l'existence d'un pseudo ou d'une adresse mail pour éviter les doublons
function checkUserInfos($pseudo, $email)
{
	$userManager = new User();
	$checkUserInfos = $userManager->checkUserInfos($pseudo, $email);
}


// Connexion
function displayConnection()
{
	require('./view/frontend/viewConnection.php');
}
function connection($pseudo)
{
	$userManager = new User();
	$connectData = $userManager->connectUser($pseudo);
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
	session_destroy();
	header('Location: index.php');
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


