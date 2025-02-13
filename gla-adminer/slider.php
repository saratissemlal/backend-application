<?php include "core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "control/themeSliderControl.php";

    $theme = \Recuperation\Admin::themeInformations($db);

    $titre = 'Slider - Global Ads';

    include "inc/_head.php";

    include "inc/_nav.php";

    include "inc/_theme-slider.php";

    include "inc/_foot.php";

}else{

    Func::redirect('../');

}