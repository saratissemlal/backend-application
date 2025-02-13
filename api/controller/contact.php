<?php

if (!isset($post['name']) || !isset($post['email']) || !isset($post['numero']) || !isset($post['message'])) API::error('004', 'Veuillez renseigner tous les champs');

$name = $post['name'];
$email = $post['email'];
$numero = $post['numero'];
$message = $post['message'];

$db->query("INSERT INTO contact (name,email,numero,message,date,statu) VALUES (?,?,?,?,?,?)",[$name,$email,$numero,$message,time(),0]);

API::success([
    "message" => "Votre message à été envoyé avec succès"
]);