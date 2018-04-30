<?php $title = 'Blog Jean Fortroche | Connexion utilisateur'; ?>

<?php $body_class = 'body_connection_page'; ?>

<?php $class_header = 'top_connection_page'; ?>

<?php ob_start(); ?>

		<div class="container connection_page">

			<div class="row justify-content-center row_contents">
				
				<div class="col-lg-8">

					<br>
			
					<h1 class="text-center">Connectez-vous !</h1>

					<br>

					<form action="index.php?p=connection" method="POST">

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nom d'utilisateur" name="pseudo" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mot de passe" name="pass" required>
							<!-- <p class="small"><a href="index.php?p=forgotPass">Mot de passe oublié ?</a></p> -->
						</div>

						<!-- <div class="form-check">
						    <input type="checkbox" class="form-check-input" id="check">
						    <label class="form-check-label" for="check">Se souvenir de moi</label>
						</div> -->

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

<?php require('./view/template/templateFrontend.php'); ?>