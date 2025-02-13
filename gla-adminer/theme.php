<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/themeControl.php";

    $theme = \Recuperation\Admin::themeInformations($db);

    $titre = 'Thème - Global Ads';

    include "inc/_head.php";

    include "inc/_theme.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}