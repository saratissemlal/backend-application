<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $titre = 'Modifier une image - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editImage.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}