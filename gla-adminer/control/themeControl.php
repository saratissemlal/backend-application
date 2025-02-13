<?php

if(!empty($_POST)){

    extract($_POST);

    $db->query("UPDATE theme SET c1 = ?, c2 = ?, c3 = ?, c4 = ?, c5 = ?, c6 = ?, c7 = ?, c8 = ?, c9 = ?, c10 = ?",[$c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10]);

    Func::setFlash('success','Couleurs du thème modifiées avec success');

    $css = new Theme($db);

    $css->save('../theme/assets/css/base.css');

    Func::redirect('theme.php');

}else{
    Func::setFlash('error','Entrez des valeurs');
}