<?php

class API {

    static function success($array){

        $array = array_merge(["success" => true], $array);

        echo strip_tags(stripslashes(json_encode($array, JSON_UNESCAPED_UNICODE)));

    }

    static function error($code, $message){

        echo json_encode([
            "success" => false,
            "message" => "Error $code, $message"
        ]);

        exit();
    }

    static function auth($post){

        if (!isset($post['login']) || $post['login'] !== LOGIN || !isset($post['token']) || $post['token'] !== TOKEN) {

            echo json_encode([
                "success" => false,
                "message" => "Error 001, Impossible de retourner un résultat"
            ]);

            exit();
        }

    }

}