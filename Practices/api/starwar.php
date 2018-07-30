<?php
$contentType = "text/html";
// $contentType = "application/json";

header("Content-Type:" . $contentType);

$url = "https://swapi.co/api/";
$cat = "planets/?page=";

/*
$ch = curl_init($url . $cat);
// prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

curl_close($ch);

print_r($result);

parse Json to array

$data = json_decode($result);


echo "Number of planets: " . $data->count . "<br />";

echo "<ol>";
foreach($data->results as $item) {
    echo "<li>" . $item->name . "</li>" ;
}
echo "</ol>";
*/

function fetch_curl($url) {
    $ch = curl_init($url);
    // prevent automatic output to screen
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($result);

    return $data;
}

$i = 1;
$count = 0;

echo "<h2>List of item:</h2>";
echo "<ol>";
do {
    $ch = $url . $cat . $i;
    $data = fetch_curl($ch);
    
    foreach($data->results as $item) {
        $count++; 
        echo "<li>" . $item->name . "</li>" ;
    }
    $i++;  
} while ($data->next != null);

echo "</ol>";
echo "<h3>Number of item: " . $count . "</h3>";

?>