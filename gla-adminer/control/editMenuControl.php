<?php

if(!empty($_POST['title']) && !empty($_POST['titlear'])){

    if(Validation::alphaNum($_POST['title'])){

        $url = (empty($_POST['urlautre'])) ? $_POST['url'] : $_POST['urlautre'];

        $num = $db->query("SELECT COUNT(idM) AS n FROM menu")->fetch();

        $db->query("UPDATE menu SET name = ?, namear = ?, url = ?, place = ? WHERE idM = ?",[$_POST['title'], $_POST['titlear'], $url, ($num->n + 1), $_GET['id']]);

        Func::setFlash('success','Le menu à été modifier avec success');

        Func::redirect('../../menu.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}