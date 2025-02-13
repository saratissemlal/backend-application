<?php require "../../core/coreAjax.php";

if(isset($_POST['text']) && isset($_POST['id']) && isset($_POST['table'])){

    $db = BDD\App::getBDD();

    $db->query("UPDATE {$_POST['table']} SET texte = ? WHERE id = ?",[$_POST['text'],$_POST['id']]);

    echo "GLAoK";

}else{

    echo "error";

}