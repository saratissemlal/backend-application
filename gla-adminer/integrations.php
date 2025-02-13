<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/integrationControl.php";

    $site = \Recuperation\Admin::siteInformations($db);

    $titre = 'Intégratons - Global Ads';

    include "inc/_head.php";

    include "inc/_integrations.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}