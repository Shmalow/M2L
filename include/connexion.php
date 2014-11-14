<?php
if(!empty($_POST)){
	$sql ='SELECT pseudo, password FROM users WHERE pseudo = :pseudo AND password = :password';
	$q = array(
		'pseudo' => $_POST['pseudo'], 
		'password' => sha1($_POST['password']));
	$req = $bdd->prepare($sql);
	$req->execute($q);

	$count = $req->rowCount($sql);
	if($count == 1){ // si son pseudo et password existe dans la BDD 
		$_SESSION['Auth'] = array(
			'pseudo' => $_POST['pseudo'], 
			'password' => sha1($_POST['password'])
		);
		header('Location: ?p=profil');
	}else{
		$error_unknown = 'Utilisateur inexistant !';
	}
}
?>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h3><strong>CONNEXION</strong></h3>
				<?php if(isset($error_unknown)){ 
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $error_unknown.
				'</div>'; }?>
				<form class="form-horizontal" method="POST" action="">

					<div class="form-group">
				    	<label for="pseudo" class="col-sm-2 control-label">Pseudo </label>
				    	<div class="col-sm-10">
				      		<input type="text" name="pseudo" id="pseudo" class="form-control" required>
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
				      		<button type="submit" name="submit" class="btn btn-success">Se connecter !</button>
				      		<a href="?p=inscription" class="btn btn-success">S'inscrire !</a>
				      	</div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>