
<?php
// AhOYVsCHeLfCM2LttVNiVAK6mUGtJmjRlevk_2qjuzV9J-gNrsj6z6MD5XREJN1h
// AjDvdPcUrSfJfrA73THbzgQimIgKmNp1u4Q1GAq1TQKcEEVsGU_zn0BaJllRMkhm

$contentType = "text/html";
// $contentType = "application/json";

header("Content-Type:" . $contentType);

$province = "QC";
$code = "H1T3H6";
$city = "montreal";
$address = "6736 29 ave";
$key = "AjDvdPcUrSfJfrA73THbzgQimIgKmNp1u4Q1GAq1TQKcEEVsGU_zn0BaJllRMkhm";
$url = "http://dev.virtualearth.net/REST/v1/Locations/CA/"
. $province . "/" . $code . "/" . $city . "?key=" . $key;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

$data = json_decode($result);
curl_close($ch);

$long = $data->resourceSets[0]->resources[0]->point->coordinates[0];
$lat = $data->resourceSets[0]->resources[0]->point->coordinates[1];

// echo $long . " | " . $lat;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div>
     <iframe width="500" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp=<?=$long?>~<?=$lat?>&lvl=15&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
     </iframe>
     <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
        <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=45.403800000000004~-73.9447&amp;sty=r&amp;lvl=11&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
        <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=45.403800000000004~-73.9447&amp;sty=r&amp;lvl=11&amp;rtp=~pos.45.403800000000004_-73.9447____&amp;FORM=MBEDLD">Get Directions</a>
    </div>
</div>
</body>
</html>
