<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $menu = \Recuperation\Admin::getMenuById($_GET['id'],$db);

    if(isset($_POST['submit'])) include "../../control/editMenuControl.php";

    $titre = 'Modifier le menu - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editMenu.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}