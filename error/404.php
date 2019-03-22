<?php
ob_start();
?>
<div class="w3-center">
	<h2 class="w3-padding">La page demandée n'existe pas ou plus</h2>
	<a href="./"><button class="w3-button w3-black"><i class="fa fa-home"></i>&nbsp;&nbsp;Retour à l'Accueil</button></a>
</div>
<?php
$content = ob_get_clean();

require('../view/frontend/template.php');