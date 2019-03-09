<?php 
ob_start();
while($post = $posts->fetch())
{
?>

<!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="public/images/<?= $post['pic_link'] ?>" alt="<?= $post['pic_title'] ?>" style="width:100%">
    <div class="w3-container">
      <h3><b><?= htmlspecialchars($post['pst_title']) ?></b></h3>
    </div>

    <div class="w3-container">
      <p class="w3-justify"><?= $postManager->theExcerpt($post['pst_content']) ?></p>        
      <p class="w3-left"><a href="index.php?action=post&id=<?= $post['pst_id'] ?>"><button class="w3-button w3-padding-large w3-white w3-border w3-large">AFFICHER PLUS&nbsp;<i class="fa fa-angle-double-right"></i></button></a></p>           
      <p class="w3-right"><a href="index.php?action=post&id=<?= $post['pst_id'] ?>#commentArea"><button class="w3-button w3-black"><b>Commentaire(s)&nbsp;</b><span class="w3-tag w3-white"><?= htmlspecialchars($post['cmt_number']) ?></button></a></span></p>
      <p class="w3-clear"></p>
    </div>
  </div>
  <hr>
<?php
}
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');
?>