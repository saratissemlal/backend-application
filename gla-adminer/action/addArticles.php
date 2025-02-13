<?php include "../core/coreAdmin.php";

if(Func::isSession()){

    if(isset($_POST['submit'])) include "../control/addArticlesControl.php";

    $titre = 'Ajouter un article - Global Ads';

    include "../inc/_head.php";

    include "../inc/_addArticles.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}