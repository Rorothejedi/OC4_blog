<?php $title = 'Blog de Jean Fortroche | Accueil'; ?>

<?php ob_start(); ?>

<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<a class="navbar-brand" href="index.php?p=home">Jean Forteroche</a>



			</nav>
		

		</div>
	
	



<?php $content = ob_get_clean(); ?>

<?php require('./view/template/template.php'); ?>