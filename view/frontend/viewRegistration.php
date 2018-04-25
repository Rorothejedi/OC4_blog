<?php $title = 'Blog Jean Fortroche | Inscription utilisateur'; ?>

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
					<h1 class="text-center">Inscription</h1>
					<br>

					<form action="index.php?p=registration" method="POST">

						<div class="form-group">
							
							<label for="pseudo">Nom d'utilisateur :</label>
							<input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php if(!empty($_SESSION['pseudo'])){ echo $_SESSION['pseudo'];} ?>" required>
							<small class="form-text text-muted small-pseudo">Veuillez saisir un nom d'utilisateur entre 2 et 25 caractères</small>

						</div>

						<div class="form-group">

							<label for="email">Email :</label>
							<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_SESSION['email'])){ echo $_SESSION['email'];} ?>" required>
							<small class="form-text text-muted small-email">Veuillez saisir une adresse e-mail valide</small>

						</div>

						<div class="form-group">

							<label for="password">Mot de passe :</label>
							<input type="password" class="form-control" id="password" name="pass" required>

							<label for="password">Confirmer le mot de passe :</label>
							<input type="password" class="form-control" id="confirmPassword" name="confirmPass" required>
							<small class="form-text text-muted small-pass">Veuillez saisir et confirmer le mot de passe que vous avez choisi, celui-ci doit contenir 12 caractères minimum et être composé de chiffres et de lettres</small>

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