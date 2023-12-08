<?php
	session_start();
	session_destroy();
	unset( $_SESSION );
	
	unset($_COOKIE['token']);
	setcookie('token', '', time() - 3600, '/');
	unset($_COOKIE['login']);
	setcookie('login', '', time() - 3600, '/');
	unset($_COOKIE['u']);
	setcookie('u', '', time() - 3600, '/');
	unset($_COOKIE['a']);
	setcookie('a', '', time() - 3600, '/');

	header("Location: ../index.php"); die;
	
?>