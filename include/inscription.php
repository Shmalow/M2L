<?php
if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])){

	$pseudo = $_POST['pseudo'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']); // Hache du mot de passe


	// Vériffie si l'utilisateur n'existe pas déjà en base avec l'email
	$req = $bdd->prepare("SELECT email FROM users WHERE email= :email LIMIT 1");
	$req->execute(array('email' => $email));

	if($req->rowCount() != 1){
		$req = $bdd->prepare("INSERT INTO users (pseudo, nom, prenom, email, password) VALUES(:pseudo, :nom, :prenom, :email, :password)");
		$req->execute(array(
			'pseudo'		=> $pseudo,
			'nom'			=> $nom,
			'prenom'		=> $prenom,
			'email' 		=> $email,
			'password'		=> $password
		));

		if($req->rowCount() != 0){ // Vérifie si l'utilisateur est bien enregistré

			?>
			<div class="alert alert-success">Super vous etes inscrit !</div>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php
		}
		else{
			?>
			<div class="alert alert-success">Une erreur s'est produite !</div>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php
		}
		
	}
	else{
		?>
			<div class="alert alert-success">Cette adresse email existe déjà !</div>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php
	}

}
?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h3><strong>INSCRIPTION</strong></h3>
				<form class="form-horizontal" role="form" method="POST" action="?p=inscription">
					<div class="form-group">
				    	<label for="pseudo" class="col-sm-2 control-label">Pseudo </label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="pseudo" name="pseudo">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="nom" class="col-sm-2 control-label">Nom </label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="nom" name="nom">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="prenom" class="col-sm-2 control-label">Prenom </label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="prenom" name="prenom">
				    	</div>
				    </div>

				  	<div class="form-group">
				    	<label for="email" class="col-sm-2 control-label">Email </label>
				    	<div class="col-sm-10">
				      		<input type="email" class="form-control" id="email" name="email">
				    	</div>
				    </div>

				  	<div class="form-group">
				    	<label for="inputPassword3" class="col-sm-2 control-label">Password </label>
				    	<div class="col-sm-10">
				      		<input type="password" class="form-control" id="inputPassword3">
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">
				      	<button type="submit" name="submit" class="btn btn-success">S'inscrire</button>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
