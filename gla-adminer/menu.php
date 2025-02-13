<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Menu - Global Ads';

    include "inc/_head.php";

    include "inc/_menu.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}