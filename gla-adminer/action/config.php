<?php include "../core/coreAdmin.php";

if(Func::isSession() && isset($_GET['id'])){

    //if(isset($_POST['submit'])) include "../control/addArticlesControl.php";

    $config = $db->select('*', 'config')->where("idC = ". $_GET['id'])->find("../../config.php");

    $user = $db->select('*', 'utilisateurs')->where("idU = ". $config->idU)->find("../../utilisateurs.php");

    $titre = 'Configuration - Global Ads';

    include "../inc/_head.php";

    include "../inc/_confidSingle.php";

    include "../inc/_foot.php";

}else{

    Func::redirect('../../');

}