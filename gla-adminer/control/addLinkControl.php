<?php

if(!empty($_POST['title']) && !empty($_POST['titlear'])){

    if(Validation::alphaNum($_POST['title'])){

        $url = (empty($_POST['urlautre'])) ? $_POST['url'] : $_POST['urlautre'];

        //$url = Validation::toUrl($url);

        $num = $db->query("SELECT COUNT(idM) AS n FROM menu")->fetch();

        $db->query("INSERT INTO menu (name,namear,url,place,parent) VALUES (?,?,?,?,?)",[$_POST['title'], $_POST['titlear'], $url,($num->n + 1),$_POST['parent']]);

        Func::setFlash('success','Lien ajouté au menu avec success');

        Func::redirect('../menu.php');

    }else{
        Func::setFlash('error','Le titre du lien doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre du lien est obligatoir');
}