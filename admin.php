<?php
session_start();

include 'lib/class-admin.php';
include 'lib/class-mini-cms.php';

$twig = MiniCMS::twigInit();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}

$admin = new Admin;

if(isset($_POST) && !empty($_POST)) {
	$admin->saveSections($_POST);
}

$admin->init( $twig );

