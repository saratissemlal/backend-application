<?php

if (!isset($post['lang'])) API::error('004', 'Impossible de retourner un résultat');

$select = ($post['lang'] == 'ar') ? "idC AS id, namear AS name, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image" : "idC AS id, name, CONCAT('" . WEBROOT . "gla-adminer/uploads/article/small/', image) AS image";

$data = $db->select($select, "categories")->get();

$images = $db->select("CONCAT('" . WEBROOT . "theme/assets/img/slider/', nameI) AS image", "image")->where("typeI = 'slider'")->get();




$about_text = ($post['lang'] == 'ar') ? "هل تحتاج للمساعده؟ لا تتردد في الاتصال بنا ، فنحن دائمًا متواجدون للإجابة على جميع أسئلتك" : "Vous avez besoins d'aide ? n'hésitez pas a nous contactez , on est toujours la pour rependre a toutes vos questions";

API::success([
    "data" => $data,
    "images" => $images,
    "texts" => [
        "phone" => "+21334187070",
        "about_text" => $about_text,
        "email" => "contact@ebricodom.dz"
    ]]);