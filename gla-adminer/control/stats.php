<?php

$commandes = $db->select('COUNT(idP) AS nbr', 'panier')->where('date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->find();
$users = $db->select('COUNT(idU) AS nbr', 'utilisateurs')->where('date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->find();
$binifits = $db->select('SUM(prix * qtt) AS nbr', 'panier')->where('stt = 2 AND date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->get();

// Utilisateurs ------------------------------------------------
$commandes_stats = $db->select('idP, DATE_FORMAT(date, "%M") AS date', 'panier')->where('date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->order('idP')->get();

$commandes_value = [];

foreach($commandes_stats AS $b){

    if(!array_key_exists($b->date, $commandes_value)) $commandes_value[$b->date] = 0;

    $commandes_value[$b->date] = @$commandes_value[$b->date] + 1;

}

// Utilisateurs ------------------------------------------------
$users_stats = $db->select('DATE_FORMAT(date, "%M") AS date', 'utilisateurs')->where('date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->order('date')->get();

$users_value = [];

foreach($users_stats AS $b){

    if(!array_key_exists($b->date, $users_value)) $users_value[$b->date] = 0;

    $users_value[$b->date] = @$users_value[$b->date] + 1;

}

// Binifices ------------------------------------------------
$binifits_stats = $db->select('idP, prix, qtt, DATE_FORMAT(date, "%M") AS date', 'panier')->where('stt = 2 AND date > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 5 month')->order('idP')->get();

$binifits_value = [];

foreach($binifits_stats AS $b){

    if(!array_key_exists($b->date, $binifits_value)) $binifits_value[$b->date] = 0;

    $binifits_value[$b->date] = @$binifits_value[$b->date] + $b->prix * $b->qtt;

}