<?php

if (!isset($post['parent_id']) || !isset($post['lang'])) API::error('004', 'Impossible de retourner un résultat');

$parent_id = $post['parent_id'];

$select = ($post['lang'] == 'ar') ? "idA AS id, titlear AS title, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image, price_min, price_max" : "idA AS id, title, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image, price_min, price_max";

$data = $db->select($select, "articles")->where("parent = ?")->get([$parent_id]);

API::success(["data" => $data]);