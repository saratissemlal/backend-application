<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Textes - Global Ads';

    include "inc/_head.php";

    include "inc/_textes.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}