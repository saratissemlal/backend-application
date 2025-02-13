<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Utilisateurs - Global Ads';

    include "inc/_head.php";

    include "inc/_utilisateurs.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}