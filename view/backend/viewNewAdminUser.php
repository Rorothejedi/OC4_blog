<?php 

	$title = 'Blog Jean Fortroche | Gestion administrateur - Création d\'un nouvel administrateur';
	$class_header = 'admin_page';

	ob_start();

?>

	</header>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin"><a href="index.php?p=adminUsers">Gestion des utilisateurs</a>&nbsp; &#12297; Nouvel administrateur</h1>
			</div>

			<div class="card">

				<div class="card-header"></div>

				<form action="index.php?p=processNewAdminUser" method="POST">

					<div class="card-body">
						
						<div class="row justify-content-center">

							<div class="col-lg-6">
	
								<br>

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
					
							</div>

						</div>

					</div>

					<div class="card-footer">
						<button class="btn btn-success" type="submit" value="newAdmin" name="newAdmin">
							Confirmer
						</button>
						<a href="index.php?p=adminUsers" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment quitter la création d\'un nouvel administrateur ?\nToutes les modifications non sauvegardées seront perdus');">Annuler</a>
					</div>

				</form>

			</div>

		</div>


<?php 

	$content = ob_get_clean();
	
	require('./view/template/templateBackend.php');

?>