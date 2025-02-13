<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/commentFormControl.php";

    $theme = \Recuperation\Admin::themeInformations($db);
    $com = \Recuperation\Admin::commentsMessage($db);

    $titre = 'Fomrulaire des commentaires - Global Ads';

    include "inc/_head.php";

    include "inc/_nav.php";

    include "inc/_comment-form.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}