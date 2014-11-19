<?php
if($connexion->islogged()){
		$pseudo = $_SESSION['Auth']['pseudo'];
}else{
		$pseudo = $_POST['pseudo'];
}
$commentaire = $_POST['commentaire'];
$id_billet = $_POST['id_billet'];
if(isset($pseudo) && !empty($pseudo) && isset($commentaire) && !empty($commentaire)){
	$sql = 'INSERT INTO commentaires (id_billet,pseudo,commentaire) 
			VALUES (:id_billet, :pseudo, :commentaire)';
	$q = array(
		'id_billet'   => $id_billet,
		'pseudo'      => $pseudo,
		'commentaire' => $commentaire
		);
	$req = $bdd->prepare($sql);
	$req->execute($q);
	header('Location: ?p=blog&billet='.$id_billet.'');
}else{
	echo 'Commentaire ou pseudo vide !';
}
?>

