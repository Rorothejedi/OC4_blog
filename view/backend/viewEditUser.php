<?php 

	$title = 'Blog Jean Fortroche | Gestion administrateur - Edition utilisateur';
	$class_header = 'admin_page';

	ob_start(); 

?>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin"><a href="index.php?p=adminPosts">Gestion des utilisateurs</a>&nbsp; &#12297; Edition des informations de l'utilisateur</h1>
			</div>

			<div class="card">

				<div class="card-header">

				</div>

				<form action="index.php?p=processEditUser&amp;userPseudo=<?= $user->pseudo() ?>" method="POST">

					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-lg-6">

								<br>

								<div class="form-group">
									<label for="pseudo">Nom d'utilisateur :</label>
									<input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $user->pseudo() ?>" required>
								</div>

								<div class="form-group">
									<label for="email">Email :</label>
									<input type="text" class="form-control" id="email" name="email" value="<?= $user->email() ?>" required>
								</div>

								<div class="form-group">
									<label for="email">Nouveau mot de passe :</label>
									<div class="row">
								   		<div class="col">
								      		<input type="password" class="form-control" id="password" name="pass" placeholder="Nouveau mot de passe">
								    	</div>
								    	<div class="col">
								      		<input type="password" class="form-control" id="confirmPassword" name="confirmPass" placeholder="Confirmer le mot de passe">
								      		<input type="hidden" name="idUser" value="<?= $user->id() ?>">
								      		<input type="hidden" name="oldPass" value="<?= $user->pass() ?>">
								    	</div>
								  	</div>
								</div>

								<br>
								
							</div>
						</div>
					</div>

					<div class="card-footer">
						<button class="btn btn-success" type="submit" value="editUser" name="editUser" onclick="return confirm('Voulez-vous vraiment enregistrer les modifications que vous venez d\'effectuées ?');">Enregistrer les modifications</button>
						<a href="index.php?p=adminUsers" class="btn btn-danger">Annuler</a>
					</div>

				</form>

			</div>

		</div>


<?php 

	$content = ob_get_clean();

	require('./view/template/templateBackend.php');

?>