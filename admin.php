<?php

require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

include 'class-section.php';
include 'class-admin.php';

$admin = new Admin;

if(isset($_POST) && !empty($_POST)) {
	$admin->saveSections($_POST);
}

$admin->init( $twig );

