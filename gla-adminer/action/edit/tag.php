<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $tag = \Recuperation\Admin::getTagById($_GET['id'],$db);

    if(isset($_POST['submit'])) include "../../control/editTagControl.php";

    $titre = 'Modifier un tag - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editTag.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}