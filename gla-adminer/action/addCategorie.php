<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addCategorieControl.php";

    $titre = 'Ajouter une categorie - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addCategorie.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}