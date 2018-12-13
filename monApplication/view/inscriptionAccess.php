<div class="row">
	<div class="col s3"></div>
	<div class="col s12 m4 l2"><p></p></div>
	<div class="col s12 m4 l8"><p><h2>Formulaire d'inscription</h2>
		<form method="post" action="monApplication.php?action=inscription" enctype="multipart/form-data">
			<p><input type="text" name="identifiant" placeholder="Identifiant" required/></li>
			<li><input type="password" name="motdepasse" placeholder="Mot de Passe" required/></li>
			<li><input type="text" name="nom" placeholder="Nom" required/></li>
			<li><input type="text" name="prenom" placeholder="Prénom" required/></li>
			<li><input type="text" name="statut" placeholder="Statut" /></li>
			<li><input type="file" name="avatar" placeholder="Avatar" /></li>
			<li><button class="light-blue darken-4 btn waves-effect waves-light" type="submit" name="button_action">S'inscrire</button></li>
			</p>
		</form>
	</div>
    <div class="col s12 m4 l2"><p></p></div>
</div>