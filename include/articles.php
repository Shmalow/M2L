<?php
$pseudo = $_SESSION['Auth']['pseudo'];
$q = array($pseudo);
$sql = 'SELECT u.pseudo, b.id_user FROM users u JOIN billets b ON u.id = b.id_user WHERE u.pseudo = ?';
$req = $bdd->prepare($sql);
$req->execute($q);
$id_user = $req->fetch();
if(!empty($_POST['titre']) && !empty($_POST['contenu'])){
	$sql = 'INSERT INTO billets (id_user,titre,contenu) 
			VALUES (:id_user, :titre, :contenu)';
	$q = array(
		'id_user'   => $id_user['id_user'],
		'titre'      => $_POST['titre'],
		'contenu' => $_POST['contenu']
		);
	$req = $bdd->prepare($sql);
	$req->execute($q);
	header('Location: ?p=profil');
}else{
	echo 'Titre ou Contenu vide !';
}
?>

