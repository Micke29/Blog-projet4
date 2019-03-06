<?php
ob_start();
?>
<div class="w3-row-padding w3-margin-bottom">
	<div class="w3-quarter">
      	<div class="w3-container w3-red w3-padding-16">
        	<div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        	<div class="w3-right">
          		<h3><?= $comments['cmt_report_total'] ?></h3>
        	</div>
        	<div class="w3-clear"></div>
        	<h4>Messages</h4>
    	</div>
    </div>
</div>
<hr>
<?php
$content = ob_get_clean();

require('template.php');
?>