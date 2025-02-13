<?php

if(!empty($_POST['ctitle']) && !empty($_POST['ctitlear'])){

    if(Validation::alphaNum($_POST['ctitle'])){

        $db->query("UPDATE categories SET name = ?, namear = ?, parent = ?, description = ?, descriptionar = ?, content = ?, contentar = ? WHERE idC = ?",[$_POST['ctitle'], $_POST['ctitlear'], $_POST['cparent'], $_POST['cdesc'], $_POST['cdescar'], $_POST['content'], $_POST['contentar'], $_GET['id']]);

        Func::setFlash('success','La catégorie à été modifier avec success');

        Func::redirect('../../categories.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}