<?php
$contentType = "text/html";
// $contentType = "application/json";

header("Content-Type:" . $contentType);

function fetch_categories($url) {
    $ch = curl_init($url);
    // prevent automatic output to screen
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($result);

    return $data;
}

$url = "https://api.chucknorris.io/jokes/categories";
$categories = fetch_categories($url);

foreach ($categories as $category) {
    
}

// print_r($categories);


$category = "dev";

$url = "https://api.chucknorris.io/jokes/random?category=" . $category;

$ch = curl_init($url);
// prevent automatic output to screen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

curl_close($ch);

$data = json_decode($result);

$img = $data->icon_url;
$value = $data->value;

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
     <img src="<?=$img?>"/>
     <p><?=$value?></p>
</div>

<div>
<form method="post">
<select name="cat">
    <option value=""></option>
    <?php foreach ($categories as $category) { ?>
    <option value="<?=$category?>"><?=$category?></option>
    <?php } ?>
</select>
<button type="submit">Submit</button>
</form>
</div>
</body>
</html>
