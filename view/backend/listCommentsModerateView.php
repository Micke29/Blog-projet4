<?php
ob_start();
?>
<div class="w3-container w3-center">
	<h2 class="w3-xlarge">Commentaires signalés</h2>
	<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
	    <thead>
	    	<th>Auteur</th>
	    	<th style="width:80%">Commentaire</th>
	    	<th class="w3-center"><i class="fa fa-check w3-text-green" aria-hidden="true"></i></th>
	    	<th class="w3-center"><i class="fa fa-trash w3-text-red" aria-hidden="true"></i></th>
	    </thead>
	    <tbody>
	    	<?php
	    	while($reportComment = $reportComments->fetch())
			{
	    	?>
	    	<tr>
		        <td><?= $reportComment['cmt_author'] ?></td>
		        <td><?= $reportComment['cmt_content'] ?></td>
		        <td>
		        	<a href="index.php?action=admin&amp;part=moderate&amp;moderate=valid&amp;id=<?= $reportComment['cmt_id'] ?>"><button class="w3-button w3-black w3-padding-right">Valider</button></a>
		        </td>
		        <td>
		        	<a href="index.php?action=admin&amp;part=moderate&amp;moderate=delete&amp;id=<?= $reportComment['cmt_id'] ?>"><button class="w3-button w3-black">Supprimer</button></a>
		        </td>        
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