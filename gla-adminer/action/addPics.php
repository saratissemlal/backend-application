<?php include "../core/coreEdit.php";

if(Func::isSession()){

    $article = \Recuperation\Admin::getArticleById($_GET['id'],$db);

    if(isset($_POST['submit'])) include "../../control/editArticleControl.php";

    $titre = 'Ajouter des photos - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addPics.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../index.php');

}