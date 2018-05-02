<nav class="navbar navbar-expand-md bg-light navbar-light">

	<a class="navbar-brand" href="index.php">Jean Forteroche</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	  	<ul class="navbar-nav">
	  		 <li class="nav-item d-none d-md-block">
		      	<a class="nav-link" href="index.php">Accueil</a>
		    </li>
		    <li class="nav-item">
		      	<a class="nav-link" href="index.php?p=listPosts">Billet simple pour l'Alaska</a>
		    </li>
	  	</ul>

	  	<ul class="navbar-nav ml-auto">
	  		
  			<?php 

  				if (!empty($_SESSION['userName'])) 
  				{
	  				if (!empty($_SESSION['access']) && $_SESSION['access'] == 1)
	  				{

  			?>

			<li class="nav-item">
			    <a class="nav-link" href="index.php?p=adminPosts">Accès admin</a> 
			</li>
			<li>
				<span class='navbar-text d-none d-md-block'> | </span>
			</li>
			

  			<?php 

					}

			?>
			<li class="nav-item">
				<a class="nav-link" href="index.php?p=userSettings">
					<strong><?= $_SESSION['userName'] ?></strong>  <i class="fas fa-cog"></i>
				</a>
			</li>
			<li>
				<span class='navbar-text d-none d-md-block'> | </span>
			</li>
			<li class="nav-item">
	      		<a class="nav-link" href="index.php?p=logout">
	      			Déconnexion <i class="fas fa-sign-out-alt"></i>
	      		</a>
	   		</li>

  			<?php

  				}
  				else
  				{

  			?>
			
			<li class="nav-item">
		      	<a class="nav-link" href="index.php?p=register">S'inscrire</a>
		    </li>
		    <li class="nav-item">
		      	<a class="nav-link" href="index.php?p=login">
		      		Se connecter <i class="fas fa-sign-in-alt"></i>
		      	</a>
		    </li>

  			<?php

  				}

  			?>
	  		
		</ul>
	</div>
</nav>