<?php 

	$title        = 'Blog Jean Fortroche | Paramètres utilisateurs'; 
	$body_class   = 'body_settings_page';
	$class_header = 'top_settings'; 

	ob_start(); 

?>

		<div class="container settings_page">
			
			<div class="row justify-content-center row_contents">

				<div class="col-lg-8">
	
					<br>
					<h1 class="text-center">Paramètres du compte</h1>
					<br>

					<form action="index.php?p=processEditUserSettings" method="POST">

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
						
						<div class="button_group">
							<button type="submit" class="btn btn-primary" name="editUser" value="editUser">Modifier</button>
							<button type="submit" class="btn btn-danger" name="deleteUser" value="deleteUser" onclick="if(confirm('Êtes-vous vraiment sûr de vouloir supprimer votre compte ?')){return confirm('Attention !\nCette action entrainera la suppression DEFINITIVE de votre compte ainsi que de tous les commentaires que vous avez postés !');}else{return false;}">
								SUPPRIMER DEFINITIVEMENT LE COMPTE
							</a>
						</div>

					</form>

				</div>

			</div>
		</div>

<?php 

	$content = ob_get_clean();

	require('./view/template/templateFrontend.php');

?>
