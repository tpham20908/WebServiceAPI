<?php
// create links required for REST
function create_links($arg="") {

    if ($arg != "") $arg = "?id=" . $arg;

    $links = [
        "rel"=>"self",
        "href"=>"localhost:8080/api/web.php" . $arg
    ];

    return $links;
}

// response
function response($data, $status = 200) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status);
    echo json_encode($data);
}

?>