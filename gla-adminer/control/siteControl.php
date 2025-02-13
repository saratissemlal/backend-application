<?php

if(!empty($_POST['nom'])){

    $db->query("UPDATE site SET name= ?,title= ?, titlear= ?, description = ? ,descriptionar = ? ,tele= ? ,email= ? ,adresse= ?, pagefacebook = ?, pagetwitter = ?, pageinstagram = ?, pageyoutube = ?, pagekiuper = ?, integercode = ?",[$_POST['nom'], $_POST['title'], $_POST['titlear'], $_POST['description'], $_POST['descriptionar'], $_POST['tele'], $_POST['email'], $_POST['adresse'], $_POST['pagefacebook'], $_POST['pagetwitter'], $_POST['pageinstagram'], $_POST['pageyoutube'], $_POST['pagekiuper'], $_POST['integercode']]);

    Func::setFlash('success','Informations modifiés avec success');

    Func::redirect('site.php');

}else{
    Func::setFlash('error','Le nom du site est obligatoir');
}
