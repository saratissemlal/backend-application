<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $categorie = \Recuperation\Admin::getCategorieById($_GET['id'],$db);

    if(isset($_POST['submit'])) include "../../control/editCategorieControl.php";

    $titre = 'Modifier une categorie - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editCategorie.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}