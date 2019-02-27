<?php 
ob_start();
while($post = $posts->fetch())
{
?>

<!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src=<?= '"public/images/' . $post['pic_link'] . '"' ?> alt=<?= $post['pic_title'] ?> style="width:100%">
    <div class="w3-container">
      <h3><b><?= htmlspecialchars($post['pst_title']) ?></b></h3>
    </div>

    <div class="w3-container">
      <p class="w3-justify"><?= htmlspecialchars($post['pst_content']) ?></p>        
      <p class="w3-left"><button class="w3-button w3-padding-large w3-white w3-border"><a class="w3-large">AFFICHER PLUS <i class="fa fa-angle-double-right"></i></a></button></p>           
      <p class="w3-right"><button class="w3-button w3-black" onclick="myFunction('commentArea<?= $post['pst_id'] ?>')"><b>Commentaire(s) </b><span class="w3-tag w3-white">3</span></button></p>
      <p class="w3-clear"></p>
  
      <!-- Example of comment field -->
      <div id="commentArea<?= $post['pst_id'] ?>" style="display:none">
        <hr>
      <?php
      $comments = $commentManager->getComments($post['pst_id']);
      while($comment = $comments->fetch())
      {
      ?>
        <div class="w3-row w3-margin-bottom">
          <div class="w3-col l10 m9">
            <h4><?= $comment['cmt_author'] ?> <span class="w3-opacity w3-medium"><?= $comment['cmt_date_fr'] ?></span></h4>
            <p><?= $comment['cmt_content'] ?></p>
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
  <hr>
<?php
}
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');
?>