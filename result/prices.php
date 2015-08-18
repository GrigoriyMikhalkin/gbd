<?php

function printCost($cost, $store, $url){
   echo "<a href=" . $url . ">";
   echo "<p>";
   echo $store . ": " . $cost;
   echo "</p>";
   echo "</a>";
}

$gameName = $_POST["name"];
$gameid = $_POST["id"];

require("parseGOG.php");
$arr[0] = parseGOG($gameName);

require("parseSteam.php");
$arr[1] = parseSteam($gameid);   
   
uasort($arr, function($a, $b) { return ((float)$a[0] > (float)$b[0] ? 1 : -1); });  

foreach ($arr as $price) {
      if (count($price) == 3) printCost($price[0], $price[2], $price[1]);}

?>
