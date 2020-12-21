<?php
 
	if(!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
		header('Location: /login.php');
		die();
	};
 
	if(!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
		$_SESSION['username'] = $_COOKIE['username'];
	};
 
	$username = $_SESSION['username'];
 
?>