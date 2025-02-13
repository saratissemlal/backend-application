<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Page - Global Ads';

    include "inc/_head.php";

    include "inc/_pages.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}