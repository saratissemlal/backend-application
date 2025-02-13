<?php require "../../../gla-adminer/core/coreAjax.php";

if(isset($_POST['id']) && Func::session()){

    $db = BDD\App::getBDD();

    $prod = $db->select('idA', 'articles')->where("idA = {$_POST['id']}")->find();

    if(!empty($prod)){

        $fav = $db->select('idF', 'favorite')->where("prod = {$_POST['id']} AND user = {$_SESSION['id']}")->find();

        if(empty($fav)){

            $db->query("INSERT INTO favorite (user, prod) VALUES (?,?)",[$_SESSION['id'], $_POST['id']]);

        }else{

            $db->query("DELETE FROM favorite WHERE idF = ?",[$fav->idF]);

        }

    }else{

        echo "error";

    }

}else{

    echo "error";

}