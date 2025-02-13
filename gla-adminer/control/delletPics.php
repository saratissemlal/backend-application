<?php include "../core/coreAdmin.php";

if(isset($_GET['img']) && isset($_GET['id'])){

    if(file_exists('../uploads/image/'.$_GET['img'])){

        $db->query("DELETE FROM image WHERE nameI = ?",[$_GET['img']]);

        unlink('../uploads/image/'.$_GET['img']);

        Func::setFlash('success','Image supprimer avec success');

        Func::redirect('../action/addPics.php?id='.$_GET['id']);

    }else{

        Func::setFlash('error','Image introuvable');

    }

}else{

    Func::setFlash('error','Image introuvable');

}

Func::redirect('../articles.php');

