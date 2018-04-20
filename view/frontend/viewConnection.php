<?php $title = 'Blog Jean Fortroche | Connexion utilisateur'; ?>

<?php ob_start(); ?>

		<div class="container">

			<div class="row justify-content-start">
				<a href="index.php?p=home">
					<i class="fas fa-arrow-alt-circle-left"></i> Revenir à l'accueil
				</a>
			</div>

			<div class="row justify-content-center">
				
				<div class="col-lg-8">

					<br>
			
					<h1 class="text-center">Connectez-vous !</h1>

					<br>

					<form action="" method="POST">

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nom d'utilisateur ou email" name="email">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mot de passe" name="pass">
							<p class="small"><a href="index.php?p=forgotPass">Mot de passe oublié ?</a></p>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="check">
						    <label class="form-check-label" for="check">Se souvenir de moi</label>
						</div>

						<br>
						
						<div class="text-center">
								<p>
									<button type="submit" class="btn btn-primary">Se connecter</button>
								</p>
								<p>
									<a href="index.php?p=register">Vous n'êtes pas encore inscrit ? Cliquez ici !</a>
								</p>
						</div>
					

					</form>

					<br>

					


				</div>

			</div>
		</div>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template/template.php'); ?>