<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maison des ligues de Lorraine</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <header class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="?p=accueil" class="navbar-brand logo"></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".headerCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse headerCollapse">
                <ul class="nav navbar-nav navbar-right nav-height">
                    <li class="active"><a href="?p=accueil"><strong>Accueil</strong></a></li>
                    <li><a href="?p=ligues"><strong>Ligues</strong></a></li>
                    <li><a href="?p=blog"><strong>Blog</strong></a></li>
                    <li><a href="?p=photos"><strong>Photos</strong></a></li>
                    <li><a href="?p=reservations"><strong>Réservations</strong></a></li>
			        <?php 
						if($security->logged()){ // si user est connecté on affiche
					?>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>pseudo de user</strong><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Publication</li>
                            	<li><a href="#">Créer une ligue</a></li>
                                <li><a href="#">Publier un article</a></li>
                                <li><a href="#">Partager des photo</a></li>
                                <li><a href="#">Réserver une salle</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Mon Compte</li>
                                <li><a href="?p=profil">Mes info</a></li>
                            <li class="divider"></li>
                            <li><a href="?p=logout">Déconnexion</a></li>
                        </ul>
                    </li>
					<?php
					}
					else{
					?>
					<li><a href="#connexion" data-toggle="modal"><strong>Connexion</strong></a></li>

					<?php
					}
					?>    
                </ul>
            </div>
        </div>
    </header> <!-- end header -->

<div class="modal fade" id="connexion" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="?p=connexion" method="POST" class="form-horizontal">
    			<div class="modal-header">
    				<button class="close" data-dismiss="modal">&times;</button>
    				<h3>Connexion</h3>
    			</div>
    			<div class="modal-body">
    				<div class="form-group">
                        <label for="pseudo" class="col-lg-2 control-label">Pseudo:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="pseudo"  name="pseudo" placeholder="pseudo ici, dude!">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password:</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="password"  name="password" placeholder="ok, yeux fermés">
                        </div>
                    </div>
    			</div>
    			<div class="modal-footer">
    				<a href="?p=inscription" class="btn btn-success">S'inscrire</a>
    				<button class="btn btn-success" type="submit" name="submit">Se Connecter</button>
    			</div>
            </form>
		</div>
	</div>
</div>