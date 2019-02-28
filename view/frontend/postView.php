<?php ob_start(); ?>

<!-- Blog entry -->
<div class="w3-card-4 w3-margin w3-white">
	<img src=<?= '"public/images/' . htmlspecialchars($post['pic_link']) . '"' ?> alt=<?= htmlspecialchars($post['pic_title']) ?> style="width:100%">
    <div class="w3-container">
    	<h3><b><?= htmlspecialchars($post['pst_title']) ?></b></h3>
    </div>

    <div class="w3-container">
    	<p class="w3-justify"><?= htmlspecialchars($post['pst_content']) ?></p>                   
    	<p class="w3-right"><span class="w3-padding w3-black"><b>Commentaire(s) </b><span class="w3-tag w3-white"><?= $post['cmt_number'] ?></span></span></p>
      	<p class="w3-clear"></p>
  
      	<!-- Example of comment field -->
      	<div id="commentArea">
        	<hr>
        	<?php
        	while($comment = $comments->fetch())
			{
        	?>
	        <div class="w3-row w3-margin-bottom">
	          <div class="w3-col l10 m9">
	            <h4><?= htmlspecialchars($comment['cmt_author']) ?> <span class="w3-opacity w3-medium"><?= htmlspecialchars($comment['cmt_date_fr']) ?></span></h4>
	            <p><?= htmlspecialchars($comment['cmt_content']) ?></p>
	          </div>
	        </div>
	        <?php
	    	}
	    	$comments->closeCursor();
	    	?>
	    </div>
	  
	    <hr>
	    <div class="w3-margin-bottom">
		    <form>
		       	<input class="w3-input" type="text" placeholder="Prénom" required><br>
		        <textarea class="w3-input" placeholder="Commentaire" required></textarea><br>
		        <input class="w3-button w3-black" type="submit" value="Commenter">
		    </form>
	    </div>
    </div>
</div>
<?php
$content = ob_get_clean();

require('template.php');
?>