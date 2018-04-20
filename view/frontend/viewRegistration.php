<?php $title = 'Blog Jean Fortroche | Inscription utilisateur'; ?>

<?php ob_start(); ?>

		<div class="container">

			<!-- <div class="row row_contents">
				<a href="index.php?p=home">
					<i class="fas fa-arrow-alt-circle-left"></i> Revenir à l'accueil
				</a>
			</div> -->

			<div class="row justify-content-center row_contents">
				
				<div class="col-lg-8">
					
					<br>
					<h1 class="text-center">Inscription</h1>
					<br>

					<form action="" method="POST">

						<div class="form-group">
							<p class="lead">Veuillez saisir un nom d'utilisateur entre 2 et 25 caractères</p>
							<label for="pseudo">Nom d'utilisateur :</label>
							<input type="text" class="form-control" id="pseudo" name="email">
						</div>

						<div class="form-group">
							<p class="lead">Saisissez une adresse e-mail valide</p>
							<label for="email">Email :</label>
							<input type="text" class="form-control" id="email" name="email">
						</div>

						<div class="form-group">
							<p class="lead">Veuillez saisir et confirmer le mot de passe que vous avez choisi</p>

							<label for="password">Mot de passe :</label>
							<input type="password" class="form-control" id="password" name="pass">

							<label for="password">Confirmer le mot de passe :</label>
							<input type="password" class="form-control" id="password" name="confirmPass">
						</div>

						<br>
						
						<div class="text-center">
							<p>
								<button type="submit" class="btn btn-primary">S'inscrire</button>
							</p>
							<p>
								<a href="index.php?p=login">Vous êtes déjà inscrit ? Cliquez ici !</a>
							</p>
						</div>

					</form>

				</div>

			</div>
		</div>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template/template.php'); ?>