<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/siteControl.php";

    $site = \Recuperation\Admin::siteInformations($db);

    $titre = 'Mon Site - Global Ads';

    include "inc/_head.php";

    include "inc/_site.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}