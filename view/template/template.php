<!DOCTYPE html>

<html lang="fr">

	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

	<body class=" <?= $body_class ?>">

	    <?= $content ?>


		<!-- Appels aux CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

		<!-- Fonction de redimmentionnement de l'image de fond -->
		<script src="./public/js/resizing.js"></script>

		<!-- Fonction de défilement fluide entre les ancres -->
		<script src="./public/js/scroll.js"></script>

		<!-- Instanciation et initialisation des objects JavaScript -->
		<script src="./public/js/global.js"></script>
			
	</body>

</html>