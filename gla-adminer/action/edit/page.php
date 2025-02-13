<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $page = \Recuperation\Admin::getPageById($_GET['id'],$db);

    if(isset($_POST['submit'])) include "../../control/editPageControl.php";

    $titre = 'Modifier une page - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editPage.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}