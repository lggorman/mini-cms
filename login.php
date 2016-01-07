<?php

include 'lib/class-mini-cms.php';
include 'lib/class-admin.php';
include 'lib/class-user.php';

if(isset($_POST) && !empty($_POST)) {
	$user = new User($_POST['username'], $_POST['password']);
	$logged_in = $user->authenticate();
	if($logged_in) {
		session_unset();
		session_start();
		$_SESSION['username'] = $user->username;
		header('Location: admin.php');
		exit();
	}
} 

$twig = MiniCMS::twigInit();
echo $twig->render('login.twig');



