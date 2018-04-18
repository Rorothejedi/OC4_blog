<?php 


require('controller/controllerFrontend.php');

try 
{

	switch (isset($_GET['p'])) {

		case 'home':
			home();
			break;

		case 'login':
			displayConnection();
			break;

		case 'register':
			displayRegistration();
			break;
		
		default:
			home();
			break;
	}
  
} 
catch(Exception $e) { // S'il y a eu une erreur, alors...

    echo 'Erreur : ' . $e->getMessage();

}