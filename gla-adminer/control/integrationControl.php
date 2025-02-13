<?php

if(isset($_POST['metatags']) && isset($_POST['analytics'])){

    $db->query("UPDATE site SET metatags = ?,analytics = ?",[$_POST['metatags'], $_POST['analytics']]);

    Func::setFlash('success','Informations modifiés avec success');

    Func::redirect('integrations.php');

}else{
    Func::setFlash('error',"Les champs Meta tags et Code d'analytics sont obligatoir");
}