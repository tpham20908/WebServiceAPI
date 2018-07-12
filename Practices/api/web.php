<?php

require_once("functions.php");
    // check for GET method
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

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
            $peopleWithLinks = ["people"=>$people, "link"=>create_links()];
            response(["people"=>$peopleWithLinks, "link"=>create_links()], 200);
        }

        
        
        // $json_people = json_encode($peopleWithLinks);

        // header("Content-Type: application/json");

        // echo $json_people;

    } else {
        // not GET, return error
        echo "<h2>ERROR</h2>";
    }
?>