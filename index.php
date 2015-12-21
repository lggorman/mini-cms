<?php

include 'class-admin.php';
include 'class-mini-cms.php';

$twig = MiniCMS::twigInit();

$admin = new Admin;
$sections = $admin->getSections();

foreach($sections as $section) {
	$content[$section->slug] = $section;
}

echo $twig->render('index.twig', $content);