<?php 

	$title = 'Blog Jean Fortroche | Liste des billets';
	$class_header = 'top_list_posts';

	ob_start(); 

?>
	
			<img src="./public/img/alaska.jpg" class="img_alaska" alt="">

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
									<p class="date_format">

										<?php 

											echo $res['date_post']. '<br class="d-md-none"> | '; 

											$countComments = (int) $nbrCommentsData[$key]['COUNT(c.id)'];

											if($countComments > 1)
											{
												echo '<small class="nbrComments">' . $countComments . ' commentaires</small>';
											}
											elseif($countComments == 1)
											{
												echo '<small class="nbrComments">' . $countComments . ' commentaire</small>';
											}
											else
											{
												echo '<small class="nbrComments">Pas de commentaire</small>';
											}
										?>
									
									</p>
									<h3><?= $res['title'] ?></h3>
									<div class="paragraph"><?= $res['SUBSTR(content, 1, 200)'] ?></div>
									<div class="btn btn-dark">Lire le chapitre</div>
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
							
								<p class="paragraphLink"><a href="index.php?p=post&amp;id=<?= $res['id'] ?>" class="chaptersLink"><?= $res['title'] ?></a></p>

							<?php 

								}

					 		?>

						</div>
					</div>
				</div>
			</div>

		</section>


<?php 

	$content = ob_get_clean();

	require('./view/template/templateFrontend.php');

?>