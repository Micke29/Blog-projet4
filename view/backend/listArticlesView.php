<?php
ob_start();
?>
<div class="w3-container w3-center">
	<div class="w3-container w3-margin-top w3-center w3-pale-red w3-text-red <?= isset($_SESSION['error']) ? 'w3-show-inline-block' : 'w3-hide' ?>" style="width:45%">
	    <?php unset($_SESSION['error']); ?>
	    <p>Problème lors de la mise à jour</p>	    
	</div>
	<h2 class="w3-xlarge">Articles publiés</h2>
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
		<thead>
		  	<th>Titre</th>
		   	<th>Date</th>
		   	<th class="w3-center"><i class="fa fa-pencil w3-text-grey" aria-hidden="true"></i></th>
		</thead>
		<tbody>
			<?php
			while($post = $posts->fetch())
			{
			?>
		   	<tr>
		   		<td><?= $post['pst_title'] ?></td>
		   		<td><?= $post['pst_date_fr'] ?></td>
		   		<td class="w3-center"><a href="index.php?action=admin&amp;part=editArticle&amp;id=<?= $post['pst_id'] ?>"><button class="w3-button w3-black">Modifier</button></a></td>
		   	</tr>
		    <?php
			}
			?>
		</tbody>
	</table>
	<br>
</div>
<?php
$content = ob_get_clean();

require('view/backend/template.php');