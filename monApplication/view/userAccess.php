<div class="row">
  <div class="col s12 m4 l3 z-depth-3">
    <?php 
      $avatar=$context->data['login']['avatar'];
      if((strpos($context->data['login']['avatar'], 'http') === true && !filter_var($context->data['login']['avatar'], FILTER_VALIDATE_URL) !== false) || !file_exists($context->data['user']['avatar'])) {
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
  </div>
</div>
