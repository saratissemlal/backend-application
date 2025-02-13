<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Catégories - Global Ads';

    include "inc/_head.php";

    include "inc/_categories.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}