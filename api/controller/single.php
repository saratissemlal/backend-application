<?php

$date_format = "%d/%m/%Y %H:%i";

if (!isset($post['id']) || !isset($post['lang'])) API::error('004', 'Impossible de retourner un résultat');

$id = $post['id'];

$select = ($post['lang'] == 'ar') ? "contentar AS content, FROM_UNIXTIME(date , '$date_format') AS date, n_see, showc" : "content, FROM_UNIXTIME(date , '$date_format') AS date, n_see, showc";

$data = $db->select($select, "articles")->where("idA = $id")->find();

$images = $db->select("CONCAT('".WEBROOT. "gla-adminer/uploads/image/', nameI) AS image", "image")->where("prI = $id AND typeI = 'article'")->get();

if(empty($images)) $images = [];

$text_1 = ($post['lang'] == 'ar') ? "Service disponible au niveau nationale" : "Service disponible au niveau nationale";
$text_2 = ($post['lang'] == 'ar') ? "Paiement à la finalisation de l'intervention" : "Paiement à la finalisation de l'intervention";

API::success([
    "data" => $data,
    "images" => $images,
    "texts" => [
        "text_1" => $text_1,
        "text_2" => $text_1,
    ]
]);