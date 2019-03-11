<?php
ob_start();
?>
<form class="w3-container w3-center" method="post" action="" enctype="multipart/form-data">
	<div class="w3-container w3-margin-top w3-center w3-pale-red w3-text-deep-orange <?= isset($_SESSION['file']) ? 'w3-show-inline-block' : 'w3-hide' ?>" style="width:45%">
		<p>Problème avec la photo, erreur <?= $_SESSION['file'] ?></p>
	    <?php unset($_SESSION['file']); ?>
	    
	</div>

	<h2 class="w3-xlarge">Création d'un article</h2>
	<input type="hidden" name="MAX_FILE_SIZE" value="80000" />
	<br><label for="picture">Illustration (700x220 Max | 80Mo Max) : </label>
	<input type="file" name="picture" id="picture" required>
	<br><br><label for="title">Titre</label>
	<br><input class="w3-input w3-show-inline-block w3-center" type="text" name="title" id="title" placeholder="Chapitre n°X" style="width:35%" required>
	<div class="w3-show-inline-block" style="width:90%">
		<br><br><textarea class="tinymce w3-hide" name="content"></textarea>
	</div>
	<button class="w3-button w3-show-inline-block w3-black w3-section w3-padding" type="submit" style="width:20%">Ajouter</button>
</form>
<?php
$content = ob_get_clean();

require('template.php');