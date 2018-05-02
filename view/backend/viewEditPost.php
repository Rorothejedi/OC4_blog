<?php 

	$title = 'Blog Jean Fortroche | Gestion administrateur - Edition Billet';
	$class_header = 'admin_page';

	ob_start();

?>

	</header>

		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin"><a href="index.php?p=adminPosts">Gestion des billets</a>&nbsp; &#12297; Edition billet</h1>
			</div>

			<div class="card">

				<div class="card-header"></div>

				<form action="index.php?p=processEditPost&amp;id=<?= $post['id'] ?>" method="POST">

					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-lg-8">

								<br>

								<div class="form-group">
									<input type="text" class="form-control" placeholder="Titre" name="title" value="<?= $post['title'] ?>" required>
								</div>

								<div class="form-group">
									<textarea name="content"><?= $post['content'] ?></textarea>
								</div>
								
							</div>
						</div>
					</div>

					<div class="card-footer">
						<button class="btn btn-success" type="submit" value="edit" name="edit" onclick="return confirm('Voulez-vous vraiment enregistrer les modifications que vous venez d\'effectuées ?');">Enregistrer les modifications</button>
						<a href="index.php?p=adminPosts" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment quitter l\'édition du billet ?\nToutes les modifications non-sauvegardées seront perdus');">Annuler</a>
					</div>

				</form>

			</div>

		</div>


<?php 

	$content = ob_get_clean();

	require('./view/template/templateBackend.php');

?>