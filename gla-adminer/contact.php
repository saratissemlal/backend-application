<?php include "core/coreAdmin.php";

if(Func::isSession()){

    $titre = 'Contact - Global Ads';

    include "inc/_head.php";

    include "inc/_contact.php";

    include "inc/_foot.php";

}else{

    if(isset($_POST['submit'])) include "control/login.php";

    include "inc/_login.php";

}