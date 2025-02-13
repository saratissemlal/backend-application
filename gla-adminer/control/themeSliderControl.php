<?php

if(!empty($_POST)){

    extract($_POST);

    $db->query("UPDATE theme SET sl_sp = ?",[$sl_sp]);

    Func::setFlash('success',"Vitesse d'animation modifiée avec success");

    $css = new Theme($db);

    $css->save('../theme/assets/css/base.css');

    Func::redirect('slider.php');

}else{

    Func::setFlash('error','Entrez des valeurs');

    Func::redirect('slider.php');
}