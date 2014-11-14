<?php // recuperation d'un billet
if (isset($_GET['billet']) && is_numeric($_GET['billet'])){
	$sql ='SELECT id, id_user, titre, contenu,  DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_creation_fr FROM billets WHERE id = ?';
	$q = array($_GET['billet']);
	$req = $bdd->prepare($sql);
	$req->execute($q);
}else{
	$sql = 'SELECT id_user, titre, contenu,  DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_creation_fr FROM billets WHERE id = (SELECT MAX(id) FROM billets) ORDER BY id DESC limit 0,1';
    $req = $bdd->query($sql);
}
$donnees = $req->fetch();
?>
<div class="container">
		<div class="row mgtop">

			<div class="col-sm-9"> <!-- article -->
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="page-header">
							<h3><?php echo $donnees['titre']; ?></h3>
							<small>Posté le <?php echo $donnees['date_creation_fr']; ?> 
								par <?php 
									$q = array('id_user' => $donnees['id_user']);
    								$auteur = $bdd->prepare('SELECT pseudo FROM users WHERE id = :id_user');
    								$auteur->execute($q);
									while($d = $auteur->fetch()){
										echo ucfirst($d['pseudo']);
									}
								?>
							</small>
						</div>
						<?php
    					echo nl2br($donnees['contenu']);
    					?>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Liste des commentaires</h3>
					</div>
					<div class="panel-body">
						<?php // recuperation des commentaires
							if(isset($_GET['billet']) && is_numeric($_GET['billet'])){
								$sql = 'SELECT pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') 
	    						AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire';
	    						$u = array($_GET['billet']);
	    						$req = $bdd->prepare($sql);
								$req->execute($u);
							}else{
								$sql = 'SELECT pseudo, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') 
	    						AS date_commentaire_fr FROM commentaires WHERE id_billet = (SELECT MAX(id) FROM billets) ORDER BY date_commentaire DESC';
	    						$req = $bdd->query($sql);
							}
							while ($donnees = $req->fetch()) {
									?>
									<p><strong><?php echo $donnees['pseudo']; ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
									<p><?php echo nl2br($donnees['commentaire']); ?></p>
									<?php
								}
							?>
					</div>
				</div> <!-- end liste commentaires -->

				<div class="row">
					<div class="col-sm-12">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1">Poster un commentaire</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<h3><strong>Poster un commentaire</strong></h3>
									<form class="form-horizontal" action="?p=comment" method="POST">
										<div class="form-group">											
											<label for="pseudo" class="col-sm-2 control-label">Pseudo </label>
					    					<div class="col-sm-10">
					    						<?php
												if($connexion->islogged()){
					    							echo '<h5>'.$_SESSION['Auth']['pseudo'].'</h5>'; 
												}else {
					    						?>
					      						<input type="text" name="pseudo" class="form-control" id="pseudo">
					      						<?php
												}
												?>
					      						<input type="hidden" name="id_billet" 
					      							value="<?php 
					      								if(isset($_GET['billet']) && is_numeric($_GET['billet'])){
					      									echo $_GET['billet'];
					      								}else{
					      									$req = $bdd->query('SELECT MAX(id) FROM billets');
															$donnees = $req->fetch();
															echo $donnees['MAX(id)'];
					      								}
					      							?>">	
					    					</div>
					  					</div>

										<div class="form-group">
					    					<label for="commentaire" class="col-sm-2 control-label">Commentaire </label>
					    					<div class="col-sm-10">
					      						<textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
					    					</div>
					  					</div>

					  					<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" name="submit" class="btn btn-success">Poster un commentaire</button>
									      	</div>
									    </div>
					  				</form>
								</div><!-- end tab-pane -->
							</div><!-- end tab-content -->
						</div><!-- end tabbable -->
					</div><!-- end col-sm-12 -->
				</div> <!--end row -->
			</div> <!-- end article --> 

			<div class="col-sm-3">
				<div class="list-group list-group-fixed">
					<?php // Récupération des billets
					$sql ='SELECT id, titre, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5';
					$req = $bdd->query($sql);
					while ($donnees = $req->fetch())
					{
					?>
					<a href="?p=blog&billet=<?php echo $donnees['id']; ?>" class="list-group-item">
						<h4 class="list-group-item-heading">
							<?php echo $donnees['titre']; ?>
							<small>le <?php echo $donnees['date_creation_fr']; ?></small>
						</h4>
					</a>
					<?php
					}
					?>
				</div> <!-- end list-group -->
				
			</div> <!-- les articles a cote -->
		</div> <!-- end row mgtop -->
</div>

