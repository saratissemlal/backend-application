<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Articles - Global Ads';

    include "inc/_head.php";

    include "inc/_articles.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}