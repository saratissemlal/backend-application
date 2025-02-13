<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addPartenaireControl.php";

    $titre = 'Ajouter un partenaire - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addPartenaire.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}