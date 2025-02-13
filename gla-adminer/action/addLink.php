<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addLinkControl.php";

    $titre = 'Ajouter un lien au menu - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addLink.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}