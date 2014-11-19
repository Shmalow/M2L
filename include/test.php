<?php // pour tester les requetes SQL quand on n'est pas sure 
$pseudo = $_SESSION['Auth']['pseudo'];
$q = array($pseudo);
$sql = 'SELECT b.titre, b.contenu, DATE_FORMAT(b.date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
    AS date_creation_fr FROM users u JOIN billets b ON u.id = b.id_user WHERE u.pseudo = ? ORDER BY date_creation_fr';
$req = $bdd->prepare($sql);
$req->execute($q);
while($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
    foreach ($donnees as $key => $value) {
    echo $key.': '.$value.'<br/>';
    }
}

?>