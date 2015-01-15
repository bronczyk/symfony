<?php

namespace Dbronczyk\DemoBundle\Post;


class Post{

	protected $url;

	public function __construct($url){
		$this -> url = $url;	
	}
	
	public function findAll(){
	
		$string = file_get_contents($this -> url);
		$json_a=json_decode($string,true);

	while (list ($id) = each ($json_a)) {
	$tags = '';
	foreach ($json_a[$id]['tags'] as $tag){
			$tags .= $tag .' ';
			//$tags .= '<span class="label label-default">'.$tag.'</span>';
		}
	
	$tab[$id]['picture'] = $json_a[$id]['picture'];
	$tab[$id]['about'] = $json_a[$id]['about'];
	$tab[$id]['tags'] = $tags;
	}
	
	//return $tab;	
	return $json_a;
	}

	public function getUrl(){
		return $this -> url;
	}



}