<?php

include_once("parse.php");

function parseGG($name)
{
	$url = "http://www.gamersgate.com/DD-" . $name . "/";
	$html = getHTML($url);

	preg_match("/price_price(.*)>([0-9]+)/",$html,$match);
	$price = $match[2];
	return($price);
}

?>
