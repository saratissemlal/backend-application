<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Historique de connexion - Global Ads';

    include "inc/_head.php";

    include "inc/_history.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}