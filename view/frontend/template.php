<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?= isset($title) ? $title : 'Mon livre, Billet simple pour l\'Alaska' ?></title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body class="w3-light-grey">

  <!-- w3-content defines a container for fixed size centered content, 
  and is wrapped around the whole page content, except for the footer in this example -->
  <div class="w3-content" style="max-width:1400px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-32"> 
    <h1><b><a href="index.php">Billet simple pour l'Alaska</a></b></h1>
    <p class="w3-hide-medium w3-hide-small">Bienvenue sur le blog de <span class="w3-tag">Jean Forteroche</span></p>
    <p class="w3-hide-large">Bienvenue sur le blog de <span class="w3-tag"><a href="#bio">Jean Forteroche</a></span></p>
  </header>

  <!-- Grid -->
  <div class="w3-row">

  <!-- Blog entries -->
  <div class="w3-col l8 s12">
    <?= $content ?>

  <!-- END BLOG ENTRIES -->
  </div>

  <!-- Introduction menu -->
  <div class="w3-col l4">
    <!-- About Card -->
    <div id="bio" class="w3-card w3-margin w3-margin-top">
      <img src="public/images/forteroche.jpg" style="width:100%">
      <div class="w3-container w3-white">
        <h4><b>Qui suis-je ?</b></h4>
        <p>Acteur et auteur à mon temps libre, je vous fais ici découvrir ma passion pour les voyages avec mes ouvrages.</p>
      </div>
    </div><hr>
    
    <!-- Posts -->
    <div class="w3-card w3-margin">
      <div class="w3-container w3-padding">
        <h4>Posts Populaires</h4>
      </div>
      <ul class="w3-ul w3-hoverable w3-white">
        <li class="w3-padding-16">
          <img src="public/images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="public/images/gondol.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
        <li class="w3-padding-16">
          <img src="public/images/skies.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Dorum</span><br>
          <span>Ultricies congue</span>
        </li>   
        <li class="w3-padding-16 w3-hide-medium w3-hide-small">
          <img src="public/images/rock.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Mingsum</span><br>
          <span>Lorem ipsum dipsum</span>
        </li>  
      </ul>
    </div>
    <hr> 

    <div class="w3-card w3-margin">
      <div class="w3-container w3-padding">
        <h4>Suis Moi</h4>
      </div>
      <div class="w3-container w3-xlarge w3-padding w3-white">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
      </div>
    </div>
    <hr>
        
    <!-- Subscribe -->
    <div class="w3-card w3-margin">
      <div class="w3-container w3-padding">
        <h4>Souscrire</h4>
      </div>
      <div class="w3-container w3-white">
        <p>Entrez votre adresse e-mail ci-dessous et recevez des notifications sur les derniers articles du blog.</p>
        <form>
          <input class="w3-input w3-border" type="email" placeholder="E-mail" style="width:100%" spellcheck="false" required><br>
          <input class="w3-button w3-block w3-red" type="submit" value="Souscrire"><br>
        </form>
      </div>
    </div>
    
  <!-- END Introduction Menu -->
  </div>

  <!-- END GRID -->
  </div><br>

  <!-- END w3-content -->
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-dark-grey" style="padding:32px">
    <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>Retour en haut</a>
    <div class="w3-right w3-right-align">
      <p>Copyright &copy; 2019 Jean FORTEROCHE - Billet simple pour l'Alaska</p>
      <p><a>Mentions légales</a></p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  </footer>
</body>
</html>