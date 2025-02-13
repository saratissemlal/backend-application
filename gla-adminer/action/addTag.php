<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) \Recuperation\Tags::addTag($_POST,$db);

    $titre = 'Ajouter un tag - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addTag.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}