<!-- Projet 4 - Créez un blog pour un écrivain | OpenClassrooms

Réalisé par Rodolphe Cabotiau
Date de début de projet : 18/04/2018
Date d'achèvement : 03/05/2018

Dernière mise à jour : 03/05/2018 -->

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
		<link href="https://fonts.googleapis.com/css?family=Gaegu%7CRaleway:400,400i,700" rel="stylesheet"> 

		<!-- Feuille de style CSS principales -->
	    <link href="./public/css/stylesheet.min.css" rel="stylesheet">

	    <title><?= $title ?></title>

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js%22%3E</script>
	    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js%22%3E</script>
	    <![endif]-->

	</head>

	<body class="<?= $body_class ?>">

		<header id="top" class="<?= $class_header ?>">

	   		<?php 

	   			include('navbar.php');
				include('alerts.php');

		  		echo $content;
	  		?>

		<!-- Bouton haut de page -->
		<a href="#top" class="top d-none d-md-block">
			<i class="fas fa-arrow-circle-up fa-3x hidden"></i>
		</a>

		<!-- Appels aux CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- Script de fonctionnement du tooltip de bootstrap -->
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();

				function errorHandler(script) {
        			script.src = "./public/js/resizing.js";
    			}
			});
		</script>

		<!-- Fonction de redimmentionnement de l'image de fond -->
		<script src="./public/js/resizing.js" onerror="errorHandler(this)"></script>

		<!-- Fonction de défilement fluide entre les ancres -->
		<script src="./public/js/scroll.js"></script>

		<!-- Fonction de récupération des informations dans les champs du modal bootstrap -->
		<script src="./public/js/modalValue.js"></script>

		<!-- Instanciation et initialisation des objects JavaScript -->
		<script src="./public/js/global.js"></script>

		<!-- Script pour les alertes bootstrap -->
		<script src="./public/js/alert.js"></script>

		<!-- Script du bouton de poste des commentaires -->
		<script src="./public/js/postComment.js"></script>

		<!-- Script qui check le contenu des inputs (connexion, inscription) -->
		<script src="./public/js/inputChecking.js"></script>
			
	</body>

</html>