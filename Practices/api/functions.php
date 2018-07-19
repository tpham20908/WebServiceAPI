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
function response($data, $status=200){
    if (isset($_GET["format"])) {
        if ($_GET["format"] == "xml") {
            response_as_xml($data, $status);
        } elseif ($_GET["format"] == "json") {
            response_as_json($data, $status);
        } else {
            $link = $data["link"];
            response_as_json(
            array("Error"=>"Unknown format", "link"=>$link),
            400
            );
        }
    } else {
        response_as_json($data, $status);
    }
}
  
function response_as_json($data, $status) {
    header("Content-Type:application/json");
    header("HTTP/1.1 " .$status);
    echo json_encode($data);
}

function response_as_xml($data, $status) {
    header("Content-Type: application/xml");
    $xml_data = new SimpleXMLElement("<?xml version='1.0'?><data></data>");
    array_to_xml($data, $xml_data);
    print $xml_data->asXML();
}
  
function array_to_xml($data, &$xml_data) {
    // https://stackoverflow.com/a/5965940
    foreach ($data as $key => $value) {
        if (is_numeric($key)) {
            $key = "item"; // . ($key + 1);
        }
        if (is_array($value)) {
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

?>