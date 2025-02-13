<?php include "../core/coreEdit.php";

if(Func::isSession() && !empty($_GET['id']) && isset($_GET['stt'])){

    $commande = $db->query("SELECT idC FROM commande WHERE idC = ?",[$_GET['id']])->fetch();

    if(!empty($commande)){

        $db->query("UPDATE commande SET stt = ? WHERE idC = ?",[$_GET['stt'], $_GET['id']]);

        Func::setFlash('success','Action effectué avec success');

        Func::redirect("../orders.php");

    }else{

        Func::setFlash('error','Impossible de valider cette Commande, Commande introuvable');

        Func::redirect("../orders.php");

    }

}else{

    Func::redirect('../index.php');

}
