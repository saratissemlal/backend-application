<?php

if(!empty($_POST['ptitle']) && $_POST['pcontent'] !== '' && !empty($_POST['ptitlear']) && $_POST['pcontentar'] !== ''){

    if(Validation::alphaNum($_POST['ptitle'])){

        $db->query("UPDATE pages SET name = ? ,namear = ? ,content = ?,contentar = ? WHERE idP = ?",[$_POST['ptitle'], $_POST['ptitlear'], $_POST['pcontent'], $_POST['pcontentar'], $_GET['id']]);

        Func::setFlash('success','La page à été modifier avec success');

        Func::redirect('../../pages.php');

    }else{
        Func::setFlash('error','Le titre doit etre en alpha numérique');
    }

}else{
    Func::setFlash('error','Le titre et le contenu sont obligatoirs');
}