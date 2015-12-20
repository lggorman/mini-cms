<?php

class Admin {

	var $sections;

	function init( $twig ) {
		$this->sections = $this->getSections();

		$content = array();
		foreach($this->sections as $section) {
			$content['sections'][$section->slug] = $section;
		}
		echo $twig->render('admin.twig', $content);
	}

	function getSections() {
		$string = file_get_contents('content.json');
		$content = json_decode($string);
		return $content->sections;
	}

	function saveSections($data) {
		$i = 0;
		$this->sections = $this->getSections();
		foreach($data as $item) {
			$this->sections[$i]->title = $item['title'];
			$this->sections[$i]->slug = $item['slug'];
			$this->sections[$i]->content = $item['content'];
			$i++;
		}
		$content = new stdClass();
		$content->sections = $this->sections;
		$string = json_encode($content, JSON_PRETTY_PRINT);
		file_put_contents('content.json', $string);	
	}

}