<?php include "../core/coreAdmin.php";

if(isset($_GET['id'])){

    if(file_exists('../uploads/article/small/'.$_GET['id'])){

        unlink('../uploads/article/small/'.$_GET['id']);
        unlink('../uploads/article/full/'.$_GET['id']);

        Func::setFlash('success','Image supprimer avec success');

    }else{

        Func::setFlash('error','Image introuvable');

    }

}else{

    Func::setFlash('error','Image introuvable');

}

Func::redirect('../galerie.php');

