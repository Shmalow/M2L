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
                    <li><a href="?p=blog"><strong>Blog</strong></a></li>
                    <li><a href="?p=ligues"><strong>Ligues</strong></a></li>
                    <li><a href="?p=reservations"><strong>Réservations</strong></a></li>
			        <?php 
						if($connexion->islogged()){ // si user est connecté on affiche
					?>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $_SESSION['Auth']['pseudo']; ?></strong><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Publication</li>
                            	<li><a href="?p=profil">Créer une ligue</a></li>
                                <li><a href="?p=profil">Publier un article</a></li>
                                <li><a href="?p=profil">Réserver une salle</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Mon Compte</li>
                                <li><a href="?p=profil">Mes info</a></li>
                                <li><a href="?p=profil">Mes articles</a></li>
                                <li><a href="?p=profil">Mes ligues</a></li>
                            <li class="divider"></li>
                            <li><a href="?p=logout">Déconnexion</a></li>
                        </ul>
                    </li>
					<?php
					}
					else{
					?>
					<li><a href="?p=connexion" ><strong>Connexion</strong></a></li>

					<?php
					}
					?>    
                </ul>
            </div>
        </div>
    </header> <!-- end header -->