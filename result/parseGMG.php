<?php

include_once("parse.php");

function parseGMG($name)
{
	$url = "http://www.greenmangaming.com/s/ru/en/pc/games/" . $name . "/";
	$html = getHTML($url);

	preg_match("/\"product_price_readable\": \"[0-9]+?(\.[0-9]+)\"/",$html,$match);
	$price = $match[0];
	return(explode(":",$price)[1]);
}

?>