<?php

//include NuSOAP toolkit (https://sourceforge.net/projects/nusoap/)
require("lib/nusoap.php");

// Functions that act as method calls from web service
function stockPrice($stock_name){
  $stocks = array("IBM"=>12.99, "Apple"=>102.54, "FBOOK"=>"bad");
  foreach ($stocks as $name => $price){
    if ($stock_name == $name)
      return $price;
  }
  return -1;
}
function stockType($stock_name){
  $stocks = array("IBM"=>"Technology", "Apple"=>"Technology", "FBOOK"=>"Website");
  foreach ($stocks as $name => $type){
    if ($stock_name == $name)
      return $type;
  }
  return "null";
}

function convertCtoF($deg) {
  return $deg * 9 / 5 + 32;
}
function convertCtoK($deg) {
  return $deg + 273.15;
}
function convertFtoC($deg) {
  return ($deg - 32) * 5 / 9;
}
function convertFtoK($deg) {
  return ($deg - 32) * 5 / 9 + 273.15;
}
function convertKtoC($deg) {
  return $deg - 273.15;
}
function convertKtoF($deg) {
  return ($deg - 273.15) * 9 / 5 + 32;
}


// initiate a new web service (using nuSoap)
$server = new soap_server();
$server->configureWSDL("server"); // configure WSDL

//register web service functions for wsdl
$server->register("stockPrice",
          array('stock_name'=>"xsd:string"),
          array('price'=>'xsd:decimal')
        );

$server->register("stockType",
          array('stock_name'=>"xsd:string"),
          array('type'=>'xsd:string')
        );

$server->register("convertCtoF",
          array("degC"=>"xsd:decimal"),
          array("degF"=>"xsd:decimal")
        );
$server->register("convertCtoK",
          array("degC"=>"xsd:decimal"),
          array("degK"=>"xsd:decimal")
        );
$server->register("convertFtoC",
          array("degF"=>"xsd:decimal"),
          array("degC"=>"xsd:decimal")
        );
$server->register("convertFtoK",
          array("degF"=>"xsd:decimal"),
          array("degK"=>"xsd:decimal")
        );
$server->register("convertKtoC",
          array("degK"=>"xsd:decimal"),
          array("degC"=>"xsd:decimal")
        );
$server->register("convertKtoF",
          array("degK"=>"xsd:decimal"),
          array("degF"=>"xsd:decimal")
        );

//start web service
$server->service(file_get_contents("php://input"));

 ?>