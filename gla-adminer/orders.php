<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Commentaires - Global Ads';

    include "inc/_head.php";

    include "inc/_orders.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}