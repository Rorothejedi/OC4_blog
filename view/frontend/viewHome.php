<?php $title = 'Blog Jean Fortroche | Accueil'; ?>

<?php $class_header = 'top_home'; ?>

<?php ob_start(); ?>

		<img src="./public/img/aurora.jpg" class="img_aurora" />
	
		<div class="container">
	  		<div class="row text_header">
	  			<div class="col-md-12">
		    		<h2>Chaque semaine, un nouveau chapitre</h2>
		    		<h1>Billet simple pour l'Alaska</h1>
					<a href="index.php?p=listPosts" class="btn btn-light btn_read">Lire les chapitres déjà disponibles</a>
				</div>
	    	</div>
	    	
    		<div class="text-center add_infos">
    			<a href="#works">
    				<p>En savoir plus sur Jean Forteroche</p>
    				<i class="fas fa-angle-down fa-3x"></i>
    			</a>
    		</div>
	    	
	    </div>

	</header>

	<section id="works">
		<div class="container">
			<div class="text-center">
				<h2>Oeuvres</h2>
			</div>

			<div class="text-center">
				<p class="description">"Billet simple pour l'Alaska" n'est pas la première oeuvre de son auteur (loin de là !).<br>Découvrez, une séléction de ses ouvrages plébiscités par la critique et ses lecteurs assidus.</p>
			</div>

			<div class="row justify-content-between">
				<div class="col-lg-4 col-sm-12 books text-center">
					<img src="./public/img/desert.jpg" alt="Image livre desert">
					<h3>66 Road</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam consequatur, voluptas, dolor velit ex officiis veniam deleniti eum perspiciatis similique accusantium, accusamus sapiente ea officia. Exercitationem illo facere eaque, a!</p>
				</div>

				<hr class="d-lg-none">
				
				<div class="col-lg-4 col-sm-12 books text-center">
					<img src="./public/img/morning.jpg" alt="Image livre mer de chine">
					<h3>Mer de Chine</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque mollitia tempora odit pariatur accusantium eius exercitationem expedita ex qui perferendis. Mollitia enim dolore autem debitis, eveniet reiciendis quo ipsa nostrum.</p>
				</div>

				<hr class="d-lg-none">

				<div class="col-lg-4 col-sm-12 books text-center">
					<img src="./public/img/louvre.jpg" alt="Image livre louvre">
					<h3>Enquête au Louvre</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus quas dolores cumque consequuntur eligendi ratione harum vero ipsa, alias impedit. Error, ratione mollitia accusamus doloribus? Reiciendis quaerat accusantium quia consequatur.</p>
				</div>

			</div>
		</div>
		
	</section>

	<section id="biography">

		<div class="container">
			<div class="text-center">
				<h2>Biographie</h2>
			</div>

			<div class="row justify-content-between">
				<div class="col-lg-5 col-sm-12 text-center">
					<img src="./public/img/jean.jpg" class="img_author" alt="Portrait de notre auteur, Jean Forteroche">
				</div>
				<div class="col-lg-7 col-sm-12 text-center author_description">

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus facilis aliquid veritatis autem. Aliquam laudantium, ducimus repellendus, neque ut dicta. Facere temporibus quidem cum tempora, sapiente nemo ea nam sed!</p>

					<blockquote class="blockquote"><cite>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut omnis, obcaecati eum qui veniam natus delectus aperiam voluptatum voluptas animi a facilis necessitatibus libero id? Quisquam maiores quasi, accusamus delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt veniam veritatis consectetur ipsum blanditiis dolore fugit laborum nihil! Harum odio maxime, dolor, dicta earum rerum facilis sint dolorum non id."</cite></blockquote>

					<footer class="blockquote-footer text-right">Jean Forteroche</footer>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem ab provident soluta quae iure recusandae, praesentium, inventore fuga dolorem vel nesciunt magnam error sed aliquid, autem? Quisquam voluptatem consequatur, incidunt!</p>
					
				</div>
			</div>
		</div>
		
	</section>


	<section id="contact">

		<div class="container">

			<div class="text-center">
				<h2>Contact</h2>
				<p class="info_agent">Pour toutes informations, merci de contacter mon agent</p>
			</div>

			<div class="row justify-content-center">

				<div class="text-center col-md-6">
					
					<p><i class="fas fa-phone-square fa-3x"></i></p>
					<p><a href="tel:0605040302"> 06 05 04 03 02</a></p>
					
				</div>

				<div class="text-center col-md-6">
					
						<p><i class="fas fa-envelope-square fa-3x"></i></p>
						<p><a href="mailto:jean.rocheforte@manager.com">jean.rocheforte@manager.com</a></p>
					
				</div>
				
			</div>
		</div>

	</section>


	<footer id="footer">

		<div class="container">

			<div class="text-center">
				<h2>Suivez-moi sur les réseaux sociaux</h2>
			</div>

			<div class="row justify-content-center social_networks">
				<a href="https://www.facebook.com/"><i class="fab fa-facebook-square fa-3x"></i></a>
				<a href="https://twitter.com/"><i class="fab fa-twitter-square fa-3x"></i></a>
				<a href="https://plus.google.com/"><i class="fab fa-google-plus-square fa-3x"></i></a>
			</div>

		</div>

	</footer>
		
	

<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateFrontend.php'); ?>