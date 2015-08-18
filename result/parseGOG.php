<?php

include_once("parse.php");

function prepareNameGOG($name){
	$gameName = str_replace(' ','_',preg_replace("/[^a-z0-9\s]/","",strtolower($_GET["name"])));
	return($gameName);
}

function parseGOG($name)
{
	$gameName = prepareNameGOG($name);	
	$url = "http://www.gog.com/game/" . $gameName;
	$html = getHTML($url);

	preg_match("/buy-price__new(.*)>([0-9]+)/",$html,$match_disc);
	preg_match("/class=\"buy-price(.*)>([0-9]+)/",$html,$match);
	if (count($match_disc[0]) != 0){
	   $price = $match[2] < $match_disc[2] ? $match[2] : $match_disc[2];}
	else $price = $match[2];
	return array($price, $url, "GOG");
}

?>