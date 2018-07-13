<?php

require_once("functions.php");
    // check for GET method
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $format = "json";

        // $people = ["John", "Peter", "Smith", "Alan", "Sylvie"];
        $people = [
            ["id"=>101, "name"=> "John", "city"=>"Toronto"],
            ["id"=>102, "name"=> "Peter", "city"=>"Calgary"],
            array("id"=>103, "name"=> "Smith", "city"=>"Edmonton"),
            array("id"=>104, "name" => "Alan", "city"=>"Montreal"),
            array("id"=>105, "name" => "Sylvie", "city"=>"Brossard"),
        ];

        // if a user requested
        if (isset($_GET["id"])) {
            $user_found = false;
            // return information about user
            foreach ($people as $item) {
                if ($_GET["id"] == $item["id"]) {
                    $user_found = true;

                    if (isset($_GET["format"])) {
                        $format = $_GET["format"];
                        response(
                            ["Person"=>$item, "link"=>create_links($_GET["id"])], 200, $format
                        );
                    } 
                }
            } // end foreach

            if (!$user_found) {
                response(
                    array(
                        "Error"=>"User was not found",
                        "link"=>create_links($_GET["id"])
                    ),
                    400,
                    "json"
                );
            }
            
        } else {
            response(["people"=>$people, "link"=>create_links()], 200, $format);
        }
        
    } else {
        // not GET, return error
        response(
            array(
                "Error"=>"Message not found",
                "Link"=>create_links()
            ),
            405,
            $format
        );
    }
?>