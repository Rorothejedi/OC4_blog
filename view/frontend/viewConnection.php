<?php $title = 'Connexion utilisateur'; ?>

<?php ob_start(); ?>



<div class="container">
	<div class="row">
		
		<div class="col align-self-center">
	
			<h1>Connectez-vous !</h1>
			<form action="" method="POST">
				<div class="form-group">
					<label for="email">Nom d'utilisateur ou email</label>
					<input type="text" class="form-control" id="email" placeholder="Nom d'utilisateur ou email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" id="password" placeholder="Mot de passe" name="pass">
				</div>
				<div class="form-check">
				    <input type="checkbox" class="form-check-input" id="check">
				    <label class="form-check-label" for="check">Check me out</label>
				</div>
				<button type="submit" class="btn btn-primary">Valider</button>
			</form>

		</div>

	</div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('./view/template/template.php'); ?>