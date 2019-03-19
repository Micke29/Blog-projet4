<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gestionnaire | Billet simple pour l'Alaska</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="public/images/avatar2.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bienvenue</span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <a href="index.php?action=admin&amp;part=preview"><h5>Tableau de bord</h5></a>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fermer le Menu</a>
    <ul style="padding:0">
      <li>
        <a class="w3-bar-item w3-padding w3-black"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Articles</a>
        <ul>
          <li>
            <a href="index.php?action=admin&amp;part=addArticle" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus w3-text-green" aria-hidden="true"></i>&nbsp; Ajouter</a>
          </li>
          <li>
            <a href="index.php?action=admin&amp;part=editArticle" class="w3-bar-item w3-button w3-padding"><i class="fa fa-pencil w3-text-grey" aria-hidden="true"></i>&nbsp; Modifier</a>
          </li>
          <li>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-trash w3-text-red" aria-hidden="true"></i>&nbsp; Supprimer</a>
          </li>
        </ul>
      </li>
      <li>
        <a class="w3-bar-item w3-padding w3-black"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp; Commentaires</a>
        <ul>
          <li>
            <a href="index.php?action=admin&part=moderate" class="w3-bar-item w3-button w3-padding"><i class="fa fa-ban w3-text-red" aria-hidden="true"></i>&nbsp; Modérer</a>
          </li>
        </ul>
      </li>     
    </ul>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <div class="w3-container w3-center w3-pale-green w3-text-green <?= isset($_SESSION['good']) ? 'w3-show' : 'w3-hide' ?>">
    <p>Article <?= $_SESSION['good'] ?></p>
    <?php unset($_SESSION['good']); ?>
  </div>

  <?= $content ?>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-dark-grey">
    <div class="w3-third">
      <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>Retour en haut</a><br>
      <a href="index.php?action=logout" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-sign-out w3-margin-right"></i>Déconnexion</a>
      <a href="index.php" target="_blank" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-pencil w3-margin-right"></i>Accueil</a>
    </div>
  
    <div class="w3-twothird w3-right-align">
      <p>Copyright &copy; 2019 Jean FORTEROCHE - Billet simple pour l'Alaska</p>
      <p><a>Mentions légales</a></p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  </footer>

  <!-- End page content -->
</div>

<script src="public/js/background.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=yh2nd2u75zmy3y9m3zo22ohwh6eu84vn0dxdul0q7vugxp78"></script>
<script>tinymce.init({ selector:'textarea.tinymce' });</script>

</body>
</html>