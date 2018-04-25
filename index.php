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

		case 'reportComment':
			if (isset($_POST['comment_id']) && $_POST['comment_id'] > 0)
			{
				reportComment($_POST['comment_id']);
			}
			else
			{
				throw new Exception('Aucun commentaire à signaler');
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