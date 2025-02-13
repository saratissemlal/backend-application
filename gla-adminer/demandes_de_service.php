<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Demandes de service - Global Ads';

    include "inc/_head.php";

    include "inc/_demandes_de_service.php";

    include "inc/_foot.php";

}else{

    if(isset($_POST['submit'])) include "control/login.php";

    include "inc/_login.php";

}