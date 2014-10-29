<?php
	$_SESSION = array();
	unset($_SESSION);
	session_destroy();
	header('location:/m2l/');
?>