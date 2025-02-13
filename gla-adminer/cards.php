<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Cards - Global Ads';

    include "inc/_head.php";

    include "inc/_cards.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}