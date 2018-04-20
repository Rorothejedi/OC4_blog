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

		case 'login':
			displayConnection();
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