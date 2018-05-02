<?php 

	$title = 'Blog Jean Fortroche | Confirmation d\'inscription';
	$body_class = 'body_registration_page';
	$class_header = 'top_registration_page';

	ob_start();

?>

	</header>

		<div class="container registration_page">
			
			<div class="row justify-content-center row_contents">

				<div class="col-lg-8">
	
					<br>
					<h1 class="text-center">Confirmation d'inscription</h1>
					<br>
					
					<p>Bienvenue <strong><?= $_SESSION['userName'] ?></strong> ! </p>

					<p>Maintenant que vous êtes inscrit, vous pouvez commenter les articles qui vous plaisent ou signaler les commentaires des autres utilisateurs que vous trouvez inappropriés.</p>

					<a href="index.php?p=login">Connectez-vous dès maintenant !</a>

					<br><br><br>

				</div>

			</div>
		</div>


<?php 

	$content = ob_get_clean();
	$_SESSION['userName'] = null;

	require('./view/template/templateFrontend.php'); 

?>