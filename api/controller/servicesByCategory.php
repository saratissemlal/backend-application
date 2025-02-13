<?php

if (!isset($post['categorie']) || !isset($post['lang'])) API::error('004', 'Impossible de retourner un résultat');

$categorie = $post['categorie'];

$select = ($post['lang'] == 'ar') ? "idA AS id, titlear AS title, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image, price_min, price_max" : "idA AS id, title, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image, price_min, price_max";

$data = $db->select($select, "articles")->where("categorie = ?")->order("idA")->get([$categorie]);

API::success(["data" => $data]);