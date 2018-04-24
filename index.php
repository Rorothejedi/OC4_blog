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
			    	if (filter_var($email, FILTER_VALIDATE_EMAIL))
				    {
				    	$countUserInfos = checkUserInfos($pseudo, $email);

				    	if ($countUserInfos == 0)
				    	{
				    		if (strlen($pass) >= 12 && preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pass)) {

				    			if ($pass == $confirmPass) 
				    			{
				    				$pass = password_hash($pass, PASSWORD_DEFAULT);
				    				registrationUser($pseudo, $pass, $email);
				    				echo 'Vous êtes bien inscrit !';
				    			}
				    			else
				    			{
				    				echo'Les mots de passes renseignés doivent être identiques';
				    			}	
				    		}
				    		else
				    		{
				    			echo 'Le mot de passe doit contenir au moins 12 caractères avec des chiffres et des lettres';
				    		}
				    	}
				    	else 
				    	{
				    		echo 'Ce nom d\'utilisateur ou cette adresse email est déjà utilisé';
				    	}
				    }
				    else 
				    {
				    	echo "Cette adresse email n'est pas valide";
				    }
				}
				else
				{
					echo 'Le nom d\'utilisateur doit faire entre 2 et 25 caractères';
				}
			}
			else
			{
				throw new Exception('L\'utilisateur n\'a pas pû être créé');
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
		
				if ($resultPseudo == true)
				{
					if (password_verify($pass, $resultPseudo['pass']))
					{

						$adminAccess = 1;
						$userAccess  = 2;

						if ($resultPseudo['access'] == $adminAccess) 
						{
							connectAdmin($pseudo);
						}
						elseif ($resultPseudo['access'] == $userAccess) 
						{
							connectUser($pseudo);
						}
						else
						{
							echo "Vous ne disposez pas de droits d'accès correct";
						}
					}
					else
					{
						echo "Le mot de passe est incorrect";
					}
				}
				else
				{
					echo "Cet identifiant n'existe pas";
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