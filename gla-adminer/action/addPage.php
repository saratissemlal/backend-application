<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addPageControl.php";

    $titre = 'Ajouter une page - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addPage.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}