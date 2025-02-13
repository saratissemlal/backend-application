<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addTextControl.php";

    $titre = 'Ajouter un texte - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addText.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}