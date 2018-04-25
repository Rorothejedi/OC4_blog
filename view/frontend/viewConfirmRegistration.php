<?php $title = 'Blog Jean Fortroche | Confirmation d\'inscription'; ?>

<?php $body_class = 'registration_page' ?>

<?php ob_start(); ?>

		<div class="container">

			<div class="row">
				<div>
					<a href="index.php?p=home" class="btn btn-dark">
						<i class="fas fa-arrow-alt-circle-left"></i> Revenir à l'accueil
					</a>
				</div>
			</div>
			
			<div class="row justify-content-center row_contents">

				<div class="col-lg-8">
	
					<br>
					<h1 class="text-center">Confirmation de l'inscription</h1>
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
?>

<?php require('./view/template/template.php'); ?>