<?php $title = 'Blog Jean Fortroche | Gestion administrateur - Utilisateurs'; ?>

<?php $body_class = 'admin_page' ?>

<?php ob_start(); ?>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin">Gestion des utilisateurs</h1>
			</div>

			<div class="card">

				<div class="table-responsive">
					<table class="table table-hover">

						<div class="card-header d-flex flex-row-reverse">
							<a href="index.php?p=newAdminUser" class="btn btn-primary">
								Nouvel administrateur <i class="fas fa-plus"></i>
							</a>
						</div>

	  					<thead >
	  						<tr class="text-center">
		  						<th scope="col" style="width: 25%; min-width: 200px;">Nom d'utilisateur</th>
		      					<th scope="col" style="width: 35%; min-width: 550px;">Email</th>
		      					<th scope="col" style="width: 30%">Accès</th>
		      					<th scope="col" style="width: 6%; min-width: 120px;">
		      						<i class="fas fa-cog"></i>
		      					</th>
		      				</tr>
	  					</thead>

	  					<tbody class="card-body">

	  						<?php 

	  							$data = $users->fetchAll();

								foreach ($data as $key => $value) 
								{

	  						?>

			 				<tr>
			 					<td class="text-center align-middle"><?= $value['pseudo'] ?></td>
						      	<td class="text-center align-middle"><?= $value['email'] ?></td>
							    <td class="text-center align-middle">
							    	<?php 
							    		if ($value['access'] == 1) 
							    		{
							    			echo "Administrateur";
							    		} 
							    		else 
							    		{
							    			echo "Membre";
							    		}
							    	?>
							    </td>
							    <td class="align-middle d-flex justify-content-around">
							    	

							    <?php 

							    	if ($value['pseudo'] != $_SESSION['userName']) 
							    	{

							    ?>

							    	<a href="index.php?p=editUser&amp;userPseudo=<?= $value['pseudo'] ?>" class="btn btn-outline-secondary">
							    		<i class="fas fa-pencil-alt"></i>
							    	</a>

							    	<form action="index.php?p=deleteUser" method="POST" style="display: inline-block;">
										<input type="hidden" name="userId" value="<?= $value['id'] ?>">
							    		<button type="submit" name="delete" value="delete" class="btn btn-outline-danger" OnClick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?\nAttention, tous les commentaires postés par cet utilisateur seront supprimés');">
							    			<i class="fas fa-times"></i>
							    		</button>
							    	</form>
							    
							    <?php

							    	}
							    	else
							    	{

							    ?>

							   		<a href="index.php?p=userSettings" class="btn btn-outline-secondary">
							    		<i class="fas fa-pencil-alt"></i>
							    	</a>




							    <?php

							    	}

							    ?>
							    </td>
							   
						    </tr>

	  						<?php 

	  							}

	  						?>

	  					</tbody>
					</table>
					<div class="card-footer">

					</div>
				</div>
			</div>
			




		</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template/templateBackend.php'); ?>