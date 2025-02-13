<?php include_once "core/core.php";

if(!empty($_GET['url'])){

    if(file_exists("controller/" . $_GET['url'] . ".php")){

        include "controller/" . $_GET['url'] . ".php";

    }else{

        echo json_encode([

            "success" => false,
            "message" => "Error 003, URL invalid"

        ]);

    }

}else{

    echo json_encode([

        "success" => false,
        "message" => "Error 002, Impossible de retourner un résultat"

    ]);

}