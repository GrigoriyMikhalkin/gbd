<?php

include_once("parse.php");

function parseSteam($gameid){
	 $url = "http://store.steampowered.com/app/" . $gameid . "/";
	 $html = getHTML($url);

	 preg_match("/itemprop=\"price\".*\"([0-9]+?,?[0-9]+)\"/",$html,$match);
	 $price = $match[1];
	 return array($price, $url, "Steam");	 
}

?>