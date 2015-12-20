<?php

require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

include 'class-section.php';
include 'class-admin.php';

$admin = new Admin;
$sections = $admin->getSections();

foreach($sections as $section) {
	$content[$section->slug] = $section;
}

echo $twig->render('index.twig', $content);