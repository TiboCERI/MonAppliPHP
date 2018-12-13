<div class="row">
  <div class="col s12 m4 l3 z-depth-3">
    <?php 
      $avatar=$context->data['login']['avatar'];
      if((strpos($context->data['login']['avatar'], 'http') === true && !filter_var($context->data['login']['avatar'], FILTER_VALIDATE_URL) !== false) || !file_exists($context->data['login']['avatar'])) {
        $avatar= '././images/avatar.png';
      } else {
        $avatar= $context->data['login']['avatar'];
      }
    ?>
    <img width="150" height="150" class="circle responsive-img" src="<?php echo $avatar ?>" </br></br>
    <?php echo "Nom    : "; echo $context->data['login']['nom']." " ?> <?php echo $context->data['login']['prenom'] ?> </br> 
    <?php echo "Statut : "; echo $context->data['login']['statut'] ?> </br>
  </div>
  <div class="col s12 m4 l6 push-l1"> <ul class="collection with-header z-depth-3">
    
  <div class="col s3"></div>
	<ul>
      <li class="collection-header "><h4>messages de <?php echo $context->data['login']['prenom']; ?> </h4></li>
      <?php
      $datamessage = $context->data['message'];
      foreach ($datamessage as $key => $message) {
        $messagepost = message::getPost($message->post);
        $infopost = new post($messagepost[0]->data);
      ?>
        <li class='collection-item avatar z-depth-2'>
        <img src="././images/<?php echo $context->data['login']['avatar']; ?>" alt='' class='circle'>
        <span class='title'> <?php echo "L'utilisateur n°".$message->emetteur." a messageé à ".$infopost->date.":"; ?></span>
        <p><?php echo $infopost->texte; ?><br>
          <a href='././monApplication.php?action=vote&idmessage=<?php echo $message->id; ?>'><i class='material-icons'>thumb_up</i></a> : <?php echo $message->nbvotes; ?> 
        </p>
        <a href='././monApplication.php?action=share&idmessage=<?php echo $message->id."&parent=".$message->emetteur."&post=".$message->post; ?>' class='secondary-content'><i class='material-icons'>input</i></a>
        </li>
      <?php
      }
      ?>
  </ul>
  </div>
</div>
