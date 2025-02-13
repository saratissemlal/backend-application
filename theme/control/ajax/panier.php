<?php require "../../../gla-adminer/core/coreAjax.php";

if(isset($_POST['ref'])){

    $db = BDD\App::getBDD();

    echo \Root\Panier::panierUse($_POST['ref'], $db);

}else{

    echo "error";

}