<?php $title = 'Blog Jean Fortroche | Gestion administrateur - Billets'; ?>

<?php $class_header = 'admin_page'; ?>

<?php ob_start(); ?>


		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin">Gestion des billets</h1>
			</div>

			<div class="card">

				<div class="table-responsive">
					<table class="table table-hover">

						<div class="card-header d-flex flex-row-reverse">
							<a href="#" class="btn btn-primary">
								Nouveau billet <i class="fas fa-plus"></i>
							</a>
						</div>

	  					<thead >
	  						<tr class="text-center">
		  						<th scope="col" style="width: 20%; min-width: 200px;">Titre</th>
		      					<th scope="col" style="width: 60%; min-width: 550px;">Contenu</th>
		      					<th scope="col" style="width: 10%">Date</th>
		      					<th scope="col" style="width: 10%; min-width: 160px;"><i class="fas fa-cog"></i></th>
		      				</tr>
	  					</thead>

	  					<tbody class="card-body">

	  						<?php 

	  							$data = $posts->fetchAll();

								foreach ($data as $key => $res) {

	  						?>

			 				<tr>
						      	<td class="text-center align-middle"><?= $res['title'] ?></td>
							    <td><?= $res['SUBSTR(content, 1, 200)'] ?></td>
							    <td class="text-center align-middle"><?= $res['mini_date_post'] ?></td>
							    <td class="align-middle" data-billet="<?= $res['id'] ?>">
							    	<a href="#" class="btn btn-outline-primary">
							    		<i class="fas fa-eye"></i>
							    	</a>
							    	<a href="#" class="btn btn-outline-secondary">
							    		<i class="fas fa-pencil-alt"></i>
							    	</a>
							    	<button class="btn btn-outline-danger">
							    		<i class="fas fa-times"></i>
							    	</button>
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