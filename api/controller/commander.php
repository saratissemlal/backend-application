<?php

if (!isset($post['besoin_title'], $post['besoin_id'], $post['besoin_price'], $post['nom'], $post['prenom'], $post['adresse'], $post['tel'], $post['type'])) API::error('004', 'Veuillez renseigner tous les champs');

$besoin_title = $post['besoin_title'];
$besoin_id = $post['besoin_id'];
$besoin_price = $post['besoin_price'];
$nom = $post['nom'];
$prenom = $post['prenom'];
$adresse = $post['adresse'];
$tel = $post['tel'];
$email = $post['email'];
$type = $post['type'];

$gps = $post['gps'];
$description = $post['description'];

$date_intervention = ($post['type'] == 2) ? date('Y-m-d', strtotime($post['date_intervention'])) . " " . date('H:i:s', strtotime($post['time_intervention'])) : date('Y-m-d H:i:s');

$db->query("INSERT INTO commande (besoin_title, besoin_id, besoin_price, nom, prenom, adresse, gps, tel, email, dscr, type, date_intervention, stt, platforme, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,0,'Mobile',NOW())", [$besoin_title, $besoin_id, $besoin_price, $nom, $prenom, $adresse, $gps, $tel, $email, $description, $type, $date_intervention]);

API::success([
    "message" => "Commande passée avec succès, nous allons vous recontacter dans les plus brefs délais"
]);