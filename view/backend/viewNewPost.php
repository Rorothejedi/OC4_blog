<?php $title = 'Blog Jean Fortroche | Gestion administrateur - Nouveau Billet'; ?>

<?php $class_header = 'admin_page'; ?>

<?php ob_start(); ?>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin"><a href="index.php?p=adminPosts">Gestion des billets</a>&nbsp; &#12297; Nouveau billet</h1>
			</div>

			<div class="card">

				<div class="card-header">

				</div>

				<form action="index.php?p=processNewPost" method="POST">

					<div class="card-body">
						<div class="row justify-content-center row_contents">
							<div class="col-lg-8">

								<br>

								<div class="form-group">
									<input type="text" class="form-control" placeholder="Titre" name="title" required>
								</div>

								<div class="form-group">
									<textarea name="content"></textarea>
								</div>
								
							</div>
						</div>
					</div>

					<div class="card-footer">
						<input class="btn btn-success" type="submit" value="Poster">
						<a href="index.php?p=adminPosts" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment quitter la création de billet ?\nLes données non-sauvegardées seront perdues');">
							Annuler
						</a>
					</div>

				</form>

			</div>

		</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateBackend.php'); ?>