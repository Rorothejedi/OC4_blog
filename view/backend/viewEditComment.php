<?php $title = 'Blog Jean Fortroche | Gestion administrateur - Edition Commentaire'; ?>

<?php $class_header = 'admin_page'; ?>

<?php ob_start(); ?>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin"><a href="index.php?p=adminComments">Gestion des commentaires</a>&nbsp; &#12297; Edition commentaire</h1>
			</div>

			<div class="card">

				<div class="card-header">

				</div>

				<form action="index.php?p=processEditComment&amp;commentId=<?= $comment['commentId'] ?>" method="POST">

					<div class="card-body">
						<div class="row justify-content-center row_contents">
							<div class="col-lg-8">

								<p>Posté le <?= $comment['comment_date'] ?> par <?= $comment['pseudo']  ?></p>

								<div class="form-group">
									<textarea name="content"><?= $comment['commentContent'] ?></textarea>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="initReport" name="initReport" <?php if ($comment['report'] == 0) {echo 'disabled';} ?>>
								  	<label class="form-check-label" for="initReport">
								    Réinitialiser les signalements
								  	</label>
								</div>
								<input type="hidden" name="valueReport" value="<?= $comment['report'] ?>">

								
							</div>
						</div>
					</div>

					<div class="card-footer">
						<button class="btn btn-success" type="submit" value="edit" name="edit" onclick="return confirm('Voulez-vous vraiment enregistrer les modifications que vous venez d\'effectuées ?');">Enregistrer les modifications</button>
						<a href="index.php?p=adminComments" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment quitter l\'édition du commentaire ?\nToutes les modifications non-sauvegardées seront perdus');">Annuler</a>
					</div>

				</form>

			</div>

		</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateBackend.php'); ?>