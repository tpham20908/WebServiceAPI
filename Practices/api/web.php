<?php

require_once("functions.php");
    // check for GET method
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $people = [
            ["id"=>101, "name"=> "John", "city"=>"Toronto"],
            ["id"=>102, "name"=> "Peter", "city"=>"Calgary"],
            array("id"=>103, "name"=> "Smith", "city"=>"Edmonton"),
            array("id"=>104, "name" => "Alan", "city"=>"Montreal"),
            array("id"=>105, "name" => "Sylvie", "city"=>"Brossard"),
        ];

        // if a user requested
        if (isset($_GET["id"])) {
            // return information about user
            $user_found = false;

            foreach ($people as $item) {
                if ($_GET["id"] == $item["id"]) {
                    $user_found = true;

                    response(
                        ["Person"=>$item, "link"=>create_links($_GET["id"])]
                    );
                }
            } // end foreach

            if (!$user_found) {
                response(
                    array(
                        "Error"=>"User was not found",
                        "link"=>create_links($_GET["id"])
                    ),
                    400
                );
            }
            
        } else {
            response(["people"=>$people, "link"=>create_links()]);
        }
        
    } else {
        // not GET, return error
        response(
            array(
                "Error"=>"Message not found",
                "Link"=>create_links()
            ),
            405
        );
    }
?>