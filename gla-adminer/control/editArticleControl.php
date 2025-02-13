<?php

if(!empty($_POST['title']) && $_POST['content'] !== '' && !empty($_POST['titlear']) && $_POST['contentar'] !== ''){

    if(Validation::alphaNum($_POST['title'])){

        $showcomments = (isset($_POST['showcomments'])) ? 1 : 0;

        $price_min = (!empty($_POST['price_min'])) ? $_POST['price_min'] : 0;
        $price_max = (!empty($_POST['price_max'])) ? $_POST['price_max'] : 0;

        $categorie = (!empty($_POST['categorie'])) ? $_POST['categorie'] : 0;
        $parent = (!empty($_POST['parent'])) ? $_POST['parent'] : 0;

        $db->query("UPDATE articles SET title = ? , titlear = ? , categorie = ?, parent = ?, content = ?, contentar = ?, price_min = ?, price_max = ?, showc = ? WHERE idA = ?",[$_POST['title'], $_POST['titlear'], $categorie, $parent, $_POST['content'], $_POST['contentar'], $price_min, $price_max, $showcomments, $_GET['id']]);
        
        //$db->query("DELETE FROM tag WHERE a = ?",[$_GET['id']]);

        /*
        if(!empty($_POST['tag'])){

            foreach($_POST['tag'] AS $t){

                $db->query("INSERT INTO tag (t,a) VALUES (?,?)",[$t,$_GET['id']]);

            }

        }
        */

        Func::setFlash('success','Article à été modifier avec success');

        //Func::redirect('../../articles.php');
        Func::redirect('#flash');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}
