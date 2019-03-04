<?php 
$title = htmlspecialchars($post['pst_title']);
ob_start();
?>

<!-- Blog entry -->
<div class="w3-card-4 w3-margin w3-white">
	<img src="public/images/<?= $post['pic_link'] ?>" alt="<?= $post['pic_title'] ?>" style="width:100%">
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
	            <h4><?= htmlspecialchars($comment['cmt_author']) ?> <span class="w3-opacity w3-medium"><?= htmlspecialchars($comment['cmt_date_fr']) ?></span> <a href="#" class="fa fa-exclamation w3-text-red w3-margin-left" aria-hidden="true" title="Signaler"></a>
	            </h4>
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
		    <form action="index.php?action=addComment&amp;id=<?= $post['pst_id'] ?>" method="post">
		       	<input id="author" class="w3-input" type="text" placeholder="Prénom" name="author" required><br>
		        <textarea id="comment" class="w3-input" placeholder="Commentaire" name="comment" required></textarea><br>
		        <input class="w3-button w3-black" type="submit" value="Commenter">
		    </form>
	    </div>
    </div>
</div>
<?php
$content = ob_get_clean();

require('template.php');
?>