<?php 

	$title = 'Blog Jean Fortroche | Connexion utilisateur';
	$body_class = 'body_connection_page';
	$class_header = 'top_connection_page';

	ob_start();

?>

	</header>

		<div class="container connection_page">

			<div class="row justify-content-center row_contents">
				
				<div class="col-lg-8">

					<br>
			
					<h1 class="text-center">Connectez-vous !</h1>

					<br>

					<form action="index.php?p=connection" method="POST">

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nom d'utilisateur" name="pseudo" value="<?php if(!empty($_SESSION['pseudo'])){ echo $_SESSION['pseudo'];} ?>" required>
						</div>

						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mot de passe" name="pass" required>
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

<?php 

	$content = ob_get_clean();

	require('./view/template/templateFrontend.php');

?>