<?php include "../core/coreEdit.php";

if(Func::isSession() && !empty($_GET['id'])){

    $db->query("UPDATE comment SET statu = 1 WHERE idC = ?",[$_GET['id']]);

    Func::setFlash('success','Commentaire validé avec success');

    Func::redirect("../commentaires.php");

}else{

    Func::redirect('../index.php');

}