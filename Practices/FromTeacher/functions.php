<?php

// creates the links required for ReST
function create_links($arg=""){

  if($arg != "") $arg = "?" . $arg;

  $links = array("rel"=>"self",
  "href"=>"http://localhost:8080/api/web.php" . $arg);

  return $links;
}

//responses
function response($data, $status=200){
  if (isset($_GET["format"])) {
    if ($_GET["format"] == "xml") {
      response_as_xml();
    } elseif ($_GET["format"] == "json") {
      response_as_json();
    } else {
      $link = $data["link"];
      response_as_json(
        array("Error"=>"Unknown format", "link"=>$link),
        400
      );
    }
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

 ?>
