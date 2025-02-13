<?php include "../core/coreEdit.php";

if(Func::isSession() && !empty($_GET['table']) && !empty($_GET['label']) && !empty($_GET['id']) && !empty($_GET['r'])){

    $db->query("DELETE FROM {$_GET['table']} WHERE {$_GET['label']} = ?",[$_GET['id']]);

    Func::setFlash('success','Suppression effctuer avec success');

    Func::redirect("../{$_GET['r']}");

}else{

    Func::redirect('../index.php');

}