<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Partenaires - Global Ads';

    include "inc/_head.php";

    include "inc/_partenaires.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}