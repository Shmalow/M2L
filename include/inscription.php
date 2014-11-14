<?php
if(!empty($_POST) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	// sécuriser les données récuperées
	// addslashes(str) permet de Add a backslash in front of each double quote
	$nom = addslashes($_POST['nom']);
	$prenom = addslashes($_POST['prenom']);
	$pseudo = addslashes($_POST['pseudo']);
	$email = addslashes($_POST['email']);
	$password = sha1($_POST['password']);

    // si email ou pseudo existe deja dans la BDD on affiche l'erreur
	$sql ='SELECT email FROM users WHERE email = :email';
	$e = array('email' => $email);
	$req = $bdd->prepare($sql);
	$req->execute($e);
	$emailExiste = $req->rowCount($sql);
	if($emailExiste == 1){
		$error_email = 'Email choisi existe deja dans notre base de données!';
	}else{
		$sql ='SELECT pseudo FROM users WHERE pseudo = :pseudo';
		$p = array('pseudo' => $pseudo);
		$req = $bdd->prepare($sql);
		$req->execute($p);
		$pseudoExiste = $req->rowCount($sql);
		if($pseudoExiste == 1){
			$error_pseudo = 'Pseudo doit etre unique !';
		}else{
			$sql = 'INSERT INTO users (nom, prenom, pseudo, email, password) 
			VALUES (:nom, :prenom, :pseudo, :email, :password)';
			$q = array(
				'nom'      => $nom,
				'prenom'   => $prenom,
				'pseudo'   => $pseudo,
				'email'    => $email,
				'password' => $password
			);
			$req = $bdd->prepare($sql);
			$req->execute($q);
			$success = 'Vous etes desormais inscrit !';
		}
	}
}else if(!empty($_POST) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error_invalide = 'Votre email n\'est pas valide !';
}


?>

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h3><strong>INSCRIPTION</strong></h3>
				<?php if(isset($error_invalide)){ 
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $error_invalide.
				'</div>'; 
				}else if(isset($error_email)){
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $error_email.
				'</div>'; 
				}else if(isset($error_pseudo)){
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $error_pseudo.
				'</div>'; 	
				}else if(isset($success)){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $success.
				'</div>'; 	
				}
				?>
				<form class="form-horizontal" method="POST" action="">

				  	<div class="form-group">
				    	<label for="nom" class="col-sm-2 control-label">Nom </label>
				    	<div class="col-sm-10">
				      		<input type="text" name="nom" id="nom" class="form-control" required>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="prenom" class="col-sm-2 control-label">Prenom </label>
				    	<div class="col-sm-10">
				      		<input type="text" name="prenom" id="prenom" class="form-control" required>
				    	</div>
				    </div>

					<div class="form-group">
				    	<label for="pseudo" class="col-sm-2 control-label">Pseudo </label>
				    	<div class="col-sm-10">
				      		<input type="text" name="pseudo" id="pseudo" class="form-control" required>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<label for="email" class="col-sm-2 control-label">Email </label>
				    	<div class="col-sm-10">
				      		<input type="email" name="email" id="email" class="form-control" required>
				    	</div>
				    </div>

				  	<div class="form-group">
				    	<label for="password" class="col-sm-2 control-label">Password </label>
				    	<div class="col-sm-10">
				      		<input type="password" name="password" id="password" class="form-control" required>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" name="submit" class="btn btn-success">S'inscrire</button>
				      	</div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>

