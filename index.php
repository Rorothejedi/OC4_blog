<?php 

require('controller/controllerFrontend.php');

try 
{

	if (isset($_GET['p']))
	{

		switch ($_GET['p']) 
		{

		case 'home':
			home();
			break;

		case 'register':
			displayRegistration();
			break;

		case 'registration':
			if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['confirmPass']) && !empty($_POST['confirmPass'])) 
			{

				$pseudo = htmlspecialchars($_POST['pseudo']);
		    	$email = htmlspecialchars($_POST['email']);
		    	$pass = htmlspecialchars($_POST['pass']);
		    	$confirmPass = htmlspecialchars($_POST['confirmPass']);

		    	if (strlen($pseudo) >= 2 && strlen($pseudo) <= 25)  
		    	{
		    		$_SESSION['pseudo'] = $pseudo;
			    	if (filter_var($email, FILTER_VALIDATE_EMAIL))
				    {
				    	$_SESSION['email'] = $email;
				    	$resultPseudo = connection($pseudo);

				    	if ($resultPseudo->pseudo() != $pseudo && $resultPseudo->email() != $email) 
				    	{
				    		if (strlen($pass) >= 12 && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pass)) 
				    		{
				    			if ($pass == $confirmPass) 
				    			{
				    				$pass = password_hash($pass, PASSWORD_DEFAULT);
				    				registrationUser($pseudo, $pass, $email);
				    				alertSuccess('Vous êtes bien inscrit !');
				    			}
				    			else
				    			{
				    				alertFailure('Les mots de passes renseignés doivent être identiques', 'register');
				    			}	
				    		}
				    		else
				    		{
				    			alertFailure('Le mot de passe doit contenir au moins 12 caractères avec des chiffres et des lettres', 'register');
				    		}
				    	}
				    	else 
				    	{
				    		alertFailure('Ce nom d\'utilisateur ou cette adresse email est déjà utilisé', 'register');
				    	}
				    }
				    else 
				    {
				    	alertFailure('Cette adresse email n\'est pas valide', 'register');
				    }
				}
				else
				{
					alertFailure('Le nom d\'utilisateur doit faire entre 2 et 25 caractères', 'register');
				}
			}
			else
			{
				throw new Exception('L\'utilisateur n\'a pas pû être créé');
			}
			break;

		case 'confirmRegister':
			if (!empty($_SESSION['newUserRegister']) && $_SESSION['newUserRegister'] === true) 
			{
				displayConfirmRegistration();
				$_SESSION['newUserRegister'] = false;
			} 
			else
			{
				displayConnection();
			}
			break;

		case 'login':
			displayConnection();
			break;

		case 'logout':
			logout();
			break;

		case 'connection':
			if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pass']) && !empty($_POST['pass'])) 
			{

				$pseudo = htmlspecialchars($_POST['pseudo']);
				$pass   = htmlspecialchars($_POST['pass']);

				$resultPseudo = connection($pseudo);
		
				if ($pseudo == $resultPseudo->pseudo())
				{
					if (password_verify($pass, $resultPseudo->pass()))
					{
						$adminAccess = 1;
						$userAccess  = 2;

						if ($resultPseudo->access() == $adminAccess) 
						{
							alertSuccess('Bienvenue ' . $pseudo . ' !');
							connectAdmin($pseudo);
						}
						elseif ($resultPseudo->access() == $userAccess) 
						{
							alertSuccess('Bienvenue ' . $pseudo . ' !');
							connectUser($pseudo);
						}
						else
						{
							alertFailure('Vous ne disposez pas de droits d\'accès correct', 'login');
						}
					}
					else
					{
						alertFailure('Le mot de passe est incorrect', 'login');
					}
				}
				else
				{
					alertFailure('Cet identifiant n\'existe pas', 'login');
				}
			}
			else
			{
				throw new Exception('Vous ne pouvez pas être connecté');
			}
			break;

		case 'listPosts':
			listPosts();
			break;

		case 'post':
		 	if (isset($_GET['id']) && $_GET['id'] > 0) 
		 	{
            	displayPost();
            } 
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
			break;

		case 'newComment':
			if (isset($_GET['id']) && $_GET['id'] > 0) 
			{
				if (isset($_SESSION['userName']) && !empty($_SESSION['userName']))
				{
					if (isset($_POST['comment']) && !empty($_POST['comment']))
					{
						$postId  = (int) $_GET['id'];
						$content = nl2br(htmlspecialchars($_POST['comment']));
						$pseudo  = $_SESSION['userName'];

						newComment($postId, $pseudo, $content);
					}
					else
					{
						alertFailure('Un commentaire ne peut pas être posté s\'il ne contient rien', 'post&id=' . $_GET['id']);
					}
				}
				else
				{
					alertFailure('Vous devez être connecté pour poster un commentaire', 'post&id=' . $_GET['id']);
				}
			}
			else
			{
				throw new Exception('Aucun identifiant de billet envoyé');
			}
			break;

		case 'reportComment':
			if (isset($_POST['comment_id']) && $_POST['comment_id'] > 0)
			{
				reportComment($_POST['comment_id']);
				alertSuccess('Votre signalement a été transmis à la modération');
			}
			else
			{
				throw new Exception('Aucun commentaire à signaler');
			}
			break;


		//-----------------  ADMIN  -------------------
		
		// _______POST_______

		case 'adminPosts':
			adminPosts();
			break;

		case 'newPost':
			newPost();
			break;

		case 'processNewPost':
			if (isset($_SESSION['access']) && $_SESSION['access'] == 1) 
			{
				if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content']))
				{
					$title = htmlspecialchars($_POST['title']);
					alertSuccess('Le billet a bien été publié');
					processNewPost($title, $_POST['content']);
				}
				else
				{
					alertFailure('Vous ne pouvez pas effectuer cette action', 'newPost');
				}
			}
			else
			{
				throw new Exception('Vous ne pouvez pas créer de nouveau billet');
			}
			break;

		case 'editPost':
			editPost();
			break;

		case 'processEditPost':
			if (isset($_SESSION['access']) && $_SESSION['access'] == 1) 
			{
				if (isset($_GET['id']) && $_GET['id'] > 0)
				{
					if (isset($_POST['edit']) && $_POST['edit'] == 'edit') 
					{
						if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content']))
						{
							$title = htmlspecialchars($_POST['title']);
							alertSuccess('Le billet a été edité avec succès');
							processEditPost($_GET['id'], $title, $_POST['content']);
						}
						else
						{
							alertFailure('Vous ne pouvez pas effectuer cette action', 'editPost&id=' . $_GET['id']);
						}
					}
					else
					{
						alertFailure('Une action doit être sélectionnée pour pouvoir être effectuée', 'editPost&id=' . $_GET['id']);
					}
				}
				else
				{
					alertFailure('Aucun identifiant de billet envoyé', 'adminPosts');
				}
				
			}
			else
			{
				throw new Exception('Vous ne pouvez pas éditer de billet');
			}
			break;

		case 'deletePost':
			if (isset($_SESSION['access']) && $_SESSION['access'] == 1) 
			{
				if (isset($_POST['postId']) && !empty($_POST['postId']))
				{
					if (isset($_POST['delete']) && $_POST['delete'] == 'delete') 
					{
						alertSuccess('Le billet a bien été supprimé');
						deletePost($_POST['postId']);
					}
					else
					{
						alertFailure('Une action doit être sélectionnée pour pouvoir être effectuée', 'adminPosts');
					}
				}
				else
				{
					alertFailure('Vous devez sélectionner un billet pour effectuer cette action', 'adminPosts');
				}
			}
			else
			{
				throw new Exception('Vous ne pouvez pas supprimer de billet');
			}
			break;

		// _______COMMENT_______

		case 'adminComments':
			adminComments();
			break;

		case 'deleteComment':
			if (isset($_SESSION['access']) && $_SESSION['access'] == 1) 
			{
				if (isset($_POST['commentId']) && !empty($_POST['commentId']))
				{
					if (isset($_POST['delete']) && $_POST['delete'] == 'delete') 
					{
						alertSuccess('Le commentaire a bien été supprimé');
						deleteComment($_POST['commentId']);
					}
					else
					{
						alertFailure('Une action doit être sélectionnée pour pouvoir être effectuée', 'adminComments');
					}
				}
				else
				{
					alertFailure('Vous devez sélectionner un commentaire pour effectuer cette action', 'adminComments');
				}
			}
			else
			{
				throw new Exception('Vous ne pouvez pas supprimer de commentaires');
			}
			break;


		// _______USER_______


		case 'adminUsers':
			adminUsers();
			break;

		case 'deleteUser':
			if (isset($_SESSION['access']) && $_SESSION['access'] == 1)
			{
				if (isset($_POST['userId']) && !empty($_POST['userId']))
				{
					if (isset($_POST['delete']) && $_POST['delete'] == 'delete')
					{
						alertSuccess('L\'utilisateur a bien été supprimé');
						deleteUser($_POST['userId']);
					}
					else
					{
						alertFailure('Une action doit être sélectionnée pour pouvoir être effectuée', 'adminUsers');
					}
				}
				else
				{
					alertFailure('Vous devez sélectionner un commentaire pour effectuer cette action', 'adminUsers');
				}
			}
			else
			{
				throw new Exception('Vous ne pouvez pas supprimer de commentaires');
			}
			break;


		default:
			home();
			break;
		}
	}
	else
	{
		home();
	}

}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}