<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addCardControl.php";

    $titre = 'Ajouter un card - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addCard.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}