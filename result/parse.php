<?php

function getHTML($url)
{
	$opts = array(
	      'http'=>array(
	      'method'=>"GET",
	      'timeout'=>2));

	$context = stream_context_create($opts);

	$html = file_get_contents($url,false,$context);

	if(!($html)) echo "Game not exists";
	return($html);
}

?>