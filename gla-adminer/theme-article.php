<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/themeArticleControl.php";

    $theme = \Recuperation\Admin::themeInformations($db);

    $titre = 'Thème article - Global Ads';

    include "inc/_head.php";

    include "inc/_nav.php";

    include "inc/_theme-article.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}