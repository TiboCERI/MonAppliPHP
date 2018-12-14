<div class="row">
  <div class="col s12 m4 l3 z-depth-3">
    <div>
    <?php
			echo '
				<img width="150" height="150" class="circle responsive-img" onerror="this.onerror=null;this.src="././images/avatar.png;" src="././images/avatar.png"></br></br>
				<p>Nom    : '.$context->data['login']['nom'].' '.$context->data['login']['prenom'].'<a href="monApplication.php?action=edituser"><i class="material-icons">assignment</i></a></p>
				<p>Statut : '.$context->data['login']['statut'].'</p>
			';
		?>
		</div>
  </div>
  <div class="col s12 m4 l7 push-l1 z-depth-5"> 
    <form method="post" action="monApplication.php?action=messageme"  enctype="multipart/form-data">
		<p><div class="input-field col s6">
      <i class="material-icons prefix">mode_edit</i>
      <textarea placeholder="Nouveau message" id="icon_prefix2" name="text" class="materialize-textarea" required></textarea>
      <div class="file-field input-field">
	    	<div class="btn light-blue darken-4">
	    		<span>Inclure photo</span>
	    		<input type="file" name="image">
	    	</div>
		    <div class="file-path-wrapper">
		    	<input class="file-path validate" type="text">
		   	</div>
	    </div>
		</div></p>
		<button class="light-blue darken-4 btn waves-effect waves-light" type="submit" name="messageform">Envoyer</button></br>
		</form>
	</div>
	
	
	
	<div class="col s12 m8 l7 push-l1"> <ul class="collection with-header z-depth-5">
  	<ul>
			<li class="collection-header "><h4>Vos Messages</h4></li>
			<?php

				var_dump($_SESSION['message']);/*
				/*
		 		foreach($context->dataMessage as $value) {
					//var_dump($message);
					//echo $message->post;
					//$messagepost = message::getPost($message -> post);
					//$infopost = new message($messagepost[0]->data);
					echo '
		    		<li class="collection-item avatar z-depth-2">
	      			<img src="././images/'.$value->image.'" alt="" class="circle">
	      			<span class="title">L\'utilisateur n°'.$message->emetteur.' a tweeté le '.$infopost->date.' : </span>
	      			<p>'.$value->texte.'</br>
	      			</p>
		    		</li>
					';

				}
			*/
			?>

		</ul>
	</div>




	
	

</div>
