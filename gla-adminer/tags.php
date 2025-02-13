<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Tags - Global Ads';

    include "inc/_head.php";

    include "inc/_tags.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}