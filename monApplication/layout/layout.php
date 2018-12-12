<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Import material icon font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

    <title>
     Ton appli !
    </title>
   
  </head>

 <body>
    <?php if(null !== $context->getSessionAttribute('is_logged') && $context->getSessionAttribute('is_logged') == 1)
    echo '
    <nav>
      <div class="nav-wrapper blue accent-2">
        
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="././monApplication.php">Page d\'accueil</a></li>
          <li><a href="monApplication.php?action=users">Liste des profils</a></li>
          <li><a href="monApplication.php?action=user">Profil utilisateur</a></li>
          <li><a href="monApplication.php?action=logout">Deconnexion</a></li>
        </ul>
      </div>
    </nav>';
    else
  	echo '
    <nav>
      <div class="nav-wrapper blue accent-2">
        
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="././monApplication.php">Page d\'accueil</a></li>
          <li><a href="monApplication.php?action=users">Liste des profils</a></li>
          <li><a href="monApplication.php?action=inscription">Inscription</a></li>
          <li><a href="monApplication.php?action=login">Connexion</a></li>
        </ul>
      </div>
    </nav>';
  
    ?>
     <?php include($template_View); ?>
</body>

</html>
