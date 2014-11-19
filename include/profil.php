<?php
if($connexion->islogged()){ // s'il est connecté

}else{
	header('Location: ?p=connexion ');
}
?>
<div class="nav navbar-inverse navbar-inverse-top"></div>
<div class="container-fluid"><h4 class="text-center"><strong>Publications</strong></h4></div>
<div class="nav navbar-inverse navbar-inverse-bottom"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<ul class="nav nav-tabs" role="tablist"><!-- Nav tabs -->
			  <li class="active"><a href="#tab1" data-toggle="tab">Publier un article</a></li>
			  <li><a href="#tab2" data-toggle="tab">Créer une ligue</a></li>
			  <li><a href="#tab3" data-toggle="tab">Réserver une salle</a></li>
			</ul><!-- /.Nav tabs -->

			<div class="tab-content"><!-- Tab panes -->
				<div class="tab-pane active" id="tab1">
					<?php
						echo '<h4>'.$_SESSION['Auth']['pseudo'];
					?>
					<small>want to publish sth...</small></h4>
					<form class="form-horizontal" action="?p=articles" method="POST">
						<div class="form-group">
							<label for="titre" class="col-sm-2 control-label">Titre </label>
							<div class="col-sm-10">
									<input class="form-control" name="titre" id="titre">
							</div>
							</div>

						<div class="form-group">
							<label for="contenu" class="col-sm-2 control-label">Contenu </label>
							<div class="col-sm-10">
									<textarea class="form-control" name="contenu" id="contenu" cols="30" rows="10" placeholder="...en disant n'import quoi on devient n'import qui..."></textarea>
							</div>
							</div>

							<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" name="submit" class="btn btn-success">Publier un article</button>
					      	</div>
					    </div>
					</form>
				</div><!-- end tab1 -->

				<div class="tab-pane" id="tab2">
					<strong>A faire !!!</strong>
				</div>

				<div class="tab-pane" id="tab3">
					<strong>???????</strong>
				</div>
			</div><!-- /.Tab panes -->

		</div>
	</div>
</div>
	

<div class="nav navbar-inverse navbar-inverse-top"></div>
<div class="container-fluid"><h4 class="text-center"><strong>Mon compte</strong></h4></div>
<div class="nav navbar-inverse navbar-inverse-bottom"></div>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Mes info</div>
		</div>
		<div class="panel-body">
			<?php
			$pseudo = array($_SESSION['Auth']['pseudo']);
			$req = $bdd->prepare('SELECT nom, prenom, pseudo, email FROM users WHERE pseudo = ?');
			$req->execute($pseudo);
			$donnees = $req->fetch(PDO::FETCH_ASSOC);
			foreach ($donnees as $key => $value) {
			    echo '<strong>'.$key.': '.$value.'</strong><br/>';
			}
			?>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Mes articles publiés</div>
		</div>
		<div class="panel-body">
			<?php
			$pseudo = $_SESSION['Auth']['pseudo'];
			$q = array($pseudo);
			$sql = 'SELECT b.titre, b.contenu, DATE_FORMAT(b.date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
			    AS date_creation_fr FROM users u JOIN billets b ON u.id = b.id_user WHERE u.pseudo = ? ORDER BY date_creation_fr DESC';
			$req = $bdd->prepare($sql);
			$req->execute($q);
			while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
 				echo '<h4>'.$donnees['titre'].'<br/>'; ?><small>Publié le <?php echo $donnees['date_creation_fr'].'</small></h4><br/>'.$donnees['contenu'].'<hr/>';
			    }
			?>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Mes ligues</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<h3>Nom de la ligue</h3>
				<div class="col-sm-12 text-center">
					<div class="thumbnail"><img src="http://lorempicsum.com/rio/255/200/2" alt="rio"></div>
					<div class="thumbnail"><img src="http://lorempicsum.com/up/255/200/2" alt="up"></div>
					<div class="thumbnail"><img src="http://lorempicsum.com/nemo/255/200/2" alt="nemo"></div>
					<div class="thumbnail"><img src="http://lorempicsum.com/futurama/255/200/2" alt="futurama"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Mes réservations</div>
		</div>
		<div class="panel-body">
			<h3>Je ne sais pas quoi mettre ici .... </h3>
		</div>
	</div>
	


</div>


<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea"
     });
    </script>