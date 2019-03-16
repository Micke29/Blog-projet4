<?php
ob_start();
?>
<div class="w3-center">
	<h2 class="w3-padding">Erreur : <?= $e ?></h2>
	<a href="index.php?action=admin"><button class="w3-button w3-black"><i class="fa fa-home"></i>&nbsp;&nbsp;Retour à l'Accueil</button></a>
</div>
<br>
<?php
$content = ob_get_clean();

require('template.php');