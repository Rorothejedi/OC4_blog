<?php 

	$title = 'Blog Jean Fortroche | Gestion administrateur - Commentaires';
	$body_class = 'admin_page';

	ob_start();

?>

	</header>
		
		<div class="container-fluid adminBackground">

			<div class="row">
				<h1 class="titleAdmin">Gestion des commentaires</h1>
			</div>

			<div class="card">

				<div class="card-header"></div>

				<div class="table-responsive">
					<table class="table table-hover">

	  					<thead >
	  						<tr class="text-center">
		  						<th scope="col" style="width: 5%; min-width: 50px;">Signalement</th>
		  						<th scope="col" style="width: 20%; min-width: 200px;">Billet affilié</th>
		  						<th scope="col" style="width: 15%; min-width: 150px;">Auteur</th>
		      					<th scope="col" style="width: 45%; min-width: 500px;">Contenu</th>
		      					<th scope="col" style="width: 10%">Date et heure</th>
		      					<th scope="col" style="width: 10%; min-width: 160px;"><i class="fas fa-cog"></i></th>
		      				</tr>
	  					</thead>

	  					<tbody class="card-body">

	  						<?php 

	  							$data = $comments->fetchAll();

	  							foreach ($data as $key => $value) {

	  						?>

			 				<tr <?php if ($value['report'] > 0 && $value['report'] < 4) { echo 'class="table-warning"';}elseif($value['report'] >= 4){echo 'class="table-danger"';} ?>>

			 					<td class="text-center align-middle"> 
			 						<?php if ($value['report'] > 0) { echo $value['report'];} ?>
			 					</td>
			 					<td class="text-center align-middle"><?= $value['title'] ?></td>
						      	<td class="text-center align-middle"><?= $value['pseudo'] ?></td>
							    <td class="align-middle"><?= $value['SUBSTR(c.content, 1, 200)'] ?></td>
							    <td class="text-center align-middle"><?= $value['comment_date'] ?></td>
							    <td class="align-middle" data-comment="">
							    	
							    	<a href="index.php?p=post&amp;id=<?= $value['postId'] ?>&amp;commentId=<?= $value['commentId'] ?>#<?= $value['commentId'] ?>" target="_blank" class="btn btn-outline-primary">
							    		<i class="fas fa-eye"></i>
							    	</a>

							    	<a href="index.php?p=editComment&amp;commentId=<?= $value['commentId'] ?>" class="btn btn-outline-secondary">
							    		<i class="fas fa-pencil-alt"></i>
							    	</a>

							    	<form action="index.php?p=deleteComment" method="POST" class="public_delete_form">
										<input type="hidden" name="commentId" value="<?= $value['commentId'] ?>">
							    		<button type="submit" name="delete" value="delete" class="btn btn-outline-danger" OnClick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">
							    			<i class="fas fa-times"></i>
							    		</button>
							    	</form>
							    	
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


<?php 

	$content = ob_get_clean();

	require('./view/template/templateBackend.php');

?>