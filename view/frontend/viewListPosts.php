<?php $title = 'Blog Jean Fortroche | Liste des billets'; ?>

<?php $class_header = 'top_list_posts'; ?>

<?php ob_start(); ?>
	
			<img src="./public/img/alaska.jpg" class="img_alaska" />

			<h1 class="text-center title_page">Billet simple pour l'Alaska</h1>

		</header>

		<section id="posts">

			<div class="container">

				<div class="row">
					<div class="col-lg-8">
						<h2>Derniers chapitres</h2>

						<?php 

							$nbrCommentsData = $nbrComments->fetchAll();
							$data = $posts->fetchAll();

							foreach ($data as $key => $res) {

						?>

							<a class="post_link" href="index.php?p=post&amp;id=<?= $res['id'] ?>" title="Lire le chapitre">
								<div class="post">
									<p class="date_format"><?= $res['date_post'] ?></p>
									<h3><?= $res['title'] ?></h3>
									<p class="paragraph"><?= $res['SUBSTR(content, 1, 200)'] ?></p>
									<!-- <p><em>?? commentaires</em></p> -->
									<button class="btn btn-dark">Lire le chapitre</button>
									<p><em><?= $nbrCommentsData[$key]['COUNT(c.id)'] ?> commentaire(s)</em></p>
								</div>
							</a>

						<?php 

							}
							$posts->closeCursor();

						?>

					</div>

					<div class="col-lg-4 all_chapter">

						<h2 class="text-center">Tous les chapitres</h2>

						<div class="links_all_chapter">

							<?php 

								$reversed = array_reverse($data);

								foreach ($reversed as $key => $res) {
						
						 	?>
							
								<a href="index.php?p=post&amp;id=<?= $res['id'] ?>"><?= $res['title'] ?></a><br>

							<?php 

								}

					 		?>

						</div>

					</div>
				</div>
				
			</div>

		</section>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateFrontend.php'); ?>