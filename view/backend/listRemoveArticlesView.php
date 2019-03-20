<?php
ob_start();
?>
<div class="w3-container w3-center">
	<h2 class="w3-xlarge">Articles publiés</h2>
	<form method="post" action="">
		<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
			<thead>
			  	<th>Titre</th>
			   	<th>Date</th>
			   	<th class="w3-center"><i class="fa fa-trash w3-text-red" aria-hidden="true"></i></th>
			</thead>
			<tbody>
				<?php
				while($post = $posts->fetch())
				{
				?>
			   	<tr>
			   		<td><?= $post['pst_title'] ?></td>
			   		<td><?= $post['pst_date_fr'] ?></td>
			   		<td class="w3-center"><input type="checkbox" name="delete[]" id="<?= $post['pst_id'] ?>" value="<?= $post['pst_id'] ?>"></td>
			   	</tr>
			    <?php
				}
				?>
			</tbody>
		</table>
		<br>
		<button class="w3-button w3-show-inline-block w3-black">Supprimer</button>
	</form><br>
</div>
<?php
$content = ob_get_clean();

require('view/backend/template.php');