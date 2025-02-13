<?php include "../core/coreAdmin.php";

if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['r']) && isset($_GET['folder'])){

    $db->query("DELETE FROM image WHERE idI = ?",[$_GET['id']]);

    if(file_exists("../../theme/assets/img/".$_GET['folder']."/".$_GET['name'])){

        unlink("../../theme/assets/img/".$_GET['folder']."/".$_GET['name']);

        Func::setFlash('success','Image supprimer avec success');

        Func::redirect("../{$_GET['r']}");

    }else{

        Func::setFlash('error','Image introuvable');

        Func::redirect("../{$_GET['r']}");

    }

}else{

    Func::setFlash('error','Image introuvable');

    Func::redirect("../{$_GET['r']}");

}

