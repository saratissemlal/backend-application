<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Commandes - Global Ads';

    include "control/stats.php";

    include "inc/_head.php";

    include "inc/_index.php";

    include "inc/_foot.php";

}else{

    if(isset($_POST['submit'])) \Recuperation\Login::login($db,$_POST['gla-login'],$_POST['gla-pass'],isset($_POST['gla-rem']));

    include "inc/_login.php";

}