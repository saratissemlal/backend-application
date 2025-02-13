<?php include "../../core/coreEdit.php";

if(Func::isSession()){

    $user = $db->select('*', 'utilisateurs')->where("idU = ?")->find([$_GET['id']], "../../utilisateurs.php");

    if(isset($_POST['submit'])) \Recuperation\Utilisateurs::editEtilisateur($_POST, $user->idU, $db);

    $titre = 'Modifier un utilisateur - Global Ads';

    include "../../inc/_head.php";

    include "../../inc/_editUser.php";

    include "../../inc/_foot.php";

}else{

    Func::redirect('../../index.php');

}