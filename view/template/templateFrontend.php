<!-- Projet 4 - Créez un blog pour un écrivain | OpenClassrooms

Réalisé par Rodolphe Cabotiau
Date de début de projet : 18/04/2018
Date d'achèvement : ../05/2018

Dernière mise à jour : 23/04/2018 -->

<!DOCTYPE html>

<html lang="fr">

	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    
	    <!-- Tags Open Graph -->
		<meta property="og:title" content="Jean Forteroche | Billet simple pour l'Alaska">
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://rodolphe.cabotiau.com/projet_4_openclassrooms/">
		<meta property="og:image" content="https://rodolphe.cabotiau.com/projet_4_openclassrooms/img/imgOpenGraph.jpg">
		<meta property="og:description" content="Découvrez le nouveau roman de Jean Forteroche chaque semaine en exclusivité !"/>
		<meta property="og:locale" content="fr_FR" />

		<!-- Tags Twitter Card -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@RCabotiau">
		<meta name="twitter:title" content="Jean Forteroche | Billet simple pour l'Alaska">
		<meta name="twitter:description" content="Découvrez le nouveau roman de Jean Forteroche chaque semaine en exclusivité !">
		<meta name="twitter:creator" content="@RCabotiau">
		<meta name="twitter:image" content="https://rodolphe.cabotiau.com/projet_4_openclassrooms/img/imgTwitterCard.jpg">

		<!-- Tags Google -->
		<meta name="description" content="Jean Forteroche | Billet simple pour l'Alaska">
		<meta name="keywords" content="Jean Forteroche, roman alaska">

		<!-- CSS Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

		<!-- Icônes FontAwesome -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

		<!-- Polices Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Gaegu|Raleway:400,400i,700" rel="stylesheet"> 
		
		<!-- Feuille de style CSS principales -->
	    <link href="./public/css/stylesheet.css" rel="stylesheet">

	    <title><?= $title ?></title>

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js%22%3E</script>
	    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js%22%3E</script>
	    <![endif]-->

	</head>

	<body>

		<header id="top" class="<?= $class_header ?>">

			<nav class="navbar navbar-expand-sm bg-light navbar-light">

				<a class="navbar-brand" href="index.php">Jean Forteroche</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>

				<div class="collapse navbar-collapse" id="collapsibleNavbar">
				  	<ul class="navbar-nav">
				  		 <li class="nav-item d-none d-md-block">
					      	<a class="nav-link" href="index.php">Accueil</a>
					    </li>
					    <li class="nav-item">
					      	<a class="nav-link" href="index.php?p=listPosts">Billet simple pour l'Alaska</a>
					    </li>
				  	</ul>

				  	<ul class="navbar-nav ml-auto">
				  		
			  			<?php 

			  				if (!empty($_SESSION['userName'])) 
			  				{

			  			?>
			  				<span class='navbar-text'>
								Vous êtes connecté, <strong><?= $_SESSION['userName'] ?></strong> | 
			  				</span>
			  				<li class="nav-item">
					      		<a class="nav-link" href="index.php?p=logout">
					      			Déconnexion <i class="fas fa-sign-out-alt"></i>
					      		</a>
					   		</li>

			  			<?php

			  				} 
			  				elseif (!empty($_SESSION['access']) && $_SESSION['access'] == 1)
			  				{
			  					
			  			?>

						<li class="nav-item">
					      	<a class="nav-link" href="index.php?p=manageComment">Accéder à l'administration</a>
					    </li>

			  			<?php

			  				}
			  				else
			  				{

			  			?>
						
						<li class="nav-item">
					      	<a class="nav-link" href="index.php?p=register">S'inscrire</a>
					    </li>
					    <li class="nav-item">
					      	<a class="nav-link" href="index.php?p=login">
					      		Se connecter <i class="fas fa-sign-in-alt"></i>
					      	</a>
					    </li>

			  			<?php

			  				}

			  			?>
				  		
					</ul>
				</div>
			</nav>


	    <?= $content ?>


		<a href="#top" class="top d-none d-md-block">
			<i class="fas fa-arrow-circle-up fa-3x hidden"></i>
		</a>

		<!-- Appels aux CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- Fonctionnement des tooltips de bootstrap -->
		<script>
			// Fonctionnement du tooltip de bootstrap
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});

			// Récupération des informations dans les champs du modal bootstrap
			$('#modalReport').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var recipient = button.data('whatever');
				var recipient_comment = button.data('comment');
				var modal = $(this);
				modal.find('#reported_comment').val(recipient);
				modal.find('#recipient_comment').val(recipient_comment);
			});
		</script>

		<!-- Fonction de redimmentionnement de l'image de fond -->
		<script src="./public/js/resizing.js"></script>

		<!-- Fonction de défilement fluide entre les ancres -->
		<script src="./public/js/scroll.js"></script>

		<!-- Instanciation et initialisation des objects JavaScript -->
		<script src="./public/js/global.js"></script>
			
	</body>

</html>