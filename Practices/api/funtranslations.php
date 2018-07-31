<?php
// $contentType = "text/html";
$contentType = "application/json";

header("Content-Type:" . $contentType);
$text = "Hello sir! my mother goes with me to the ocean.";

$url = "http://api.funtranslations.com/translate/pirate.json?text=" . $text;

$ch = curl_init($url);
// prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

curl_close($ch);

print_r($result);

?>