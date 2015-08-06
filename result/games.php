<html>
<head>
	<link rel="stylesheet" href="http://localhost/greesha/getbestdeal/stylesheets/result.css" />
</head>

<body>

<?php
include("../header.php");

include("parse.php");

$gameName = $_POST["gameName"];

$url = "http://store.steampowered.com/search/?snr=1_7_7_151_12&term=" . $gameName;
$html = getHTML($url);

preg_match_all("/data-ds-appid.*\"([0-9]+)\"/", $html, $match_id, PREG_PATTERN_ORDER);
preg_match_all("/search_capsule\">(.*)alt/", $html, $match_logo, PREG_PATTERN_ORDER);
preg_match_all("/title\">(.*)</", $html, $match_title, PREG_PATTERN_ORDER);

$i = 0;
foreach($match_title[1] as $title) {
			echo "<a href=\"http://localhost/greesha/getbestdeal/result/prices.php?name=" . $title . "&&id=" . $match_id[1][$i] . "\">";
			echo "<p>" . $title . "</p>";
			echo "</a>";
			++$i;			
}
?>

</body>
</html>
