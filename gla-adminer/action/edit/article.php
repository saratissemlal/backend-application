<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $article = \Recuperation\Admin::getArticleById($_GET['id'],$db);

    $notif = new \Recuperation\Notif\Notification($db);

    if(isset($_POST['submit'])) include "../../control/editArticleControl.php";

    $titre = 'Modifier un article - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editArticle.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}