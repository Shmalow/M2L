<?php

class Auth{
	static function islogged()
	{
		global $bdd;
		if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['pseudo']) && isset($_SESSION['Auth']['password'])){
			$sql = 'SELECT pseudo, password FROM users WHERE pseudo = :pseudo AND password = :password';
			$q = array(
				'pseudo'    => $_SESSION['Auth']['pseudo'], 
				'password' => $_SESSION['Auth']['password']);
			$req = $bdd->prepare($sql);
			$req->execute($q);
			$count = $req->rowCount($sql);
			if($count == 1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
?>