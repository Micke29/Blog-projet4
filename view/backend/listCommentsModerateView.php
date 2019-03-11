<?php
ob_start();
?>
<div class="w3-container w3-center">
	<h2 class="w3-xlarge">Commentaires signalés</h2>
	<form method="post" action="">
	    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
		    <thead>
		    	<th>Auteur</th>
		    	<th style="width:85%">Commentaire</th>
		    	<th><i class="fa fa-check w3-text-green" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash w3-text-red" aria-hidden="true"></i></th>
		    </thead>
		    <tbody>
		    	<?php
		    	while($reportComment = $reportComments->fetch())
				{
		    	?>
		    	<tr>
			        <td><?= $reportComment['cmt_author'] ?></td>
			        <td><?= $reportComment['cmt_content'] ?></td>
			        <td><input type="radio" name="moderate" id="<?= $reportComment['cmt_id'] ?>" value="valid">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="moderate" id="<?= $reportComment['cmt_id'] ?>" value="delete"></td>        
			    </tr>
			    <?php
				}
			    ?>
		    </tbody>
	    </table>
	    <br>
	    <button class="w3-button w3-show-inline-block w3-black">Gérer</button>
	</form><br>
  </div>
<?php
$content = ob_get_clean();

require('view/backend/template.php');