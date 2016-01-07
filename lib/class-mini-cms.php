<?php

class MiniCMS {

	static function twigInit() {
		require_once 'vendor/autoload.php';
		$loader = new Twig_Loader_Filesystem('templates');
		$twig = new Twig_Environment($loader);
		return $twig;
	}

}